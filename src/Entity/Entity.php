<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityInterface.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Entity\EntityPropertyUtil;
use TheSportsDb\PropertyMapper\PropertyMapDefinition;

/**
 * Description of Entity
 *
 * @author drupalpro
 */
abstract class Entity implements EntityInterface {

  /**
   * The property map definition.
   *
   * @var \TheSportsDb\PropertyMapper\PropertyMapDefinition
   */
  protected static $propertyMapDefinition;

  /**
   * Creates a new Entity object.
   *
   * @param \stdClass $values
   *   The entity data.
   */
  public function __construct(\stdClass $values) {
    $this->update($values);
  }

  /**
   * {@inheritdoc}
   */
  public function raw() {
    if (isset($this->_raw)) {
      return $this->_raw;
    }
    $this->_raw = new \stdClass();
    $reflection = new \ReflectionClass($this);
    $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      // Skip static methods.
      if ($method->isStatic()) {
        continue;
      }
      $methodName = $method->getName();
      if (strpos($methodName, 'get') === 0) {
        $prop = lcfirst(substr($methodName, 3));
        if ($reflection->hasProperty($prop)) {
          $val = $this->{$methodName}();
          $this->_raw->{$prop} = EntityPropertyUtil::getRawValue($val);
        }
      }
    }
    return $this->_raw;
  }

  /**
   * {@inheritdoc}
   */
  public function update(\stdClass $values) {
    foreach ((array) $values as $prop => $val) {
      if (property_exists($this, $prop)) {
        $this->{$prop} = $val;
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getEntityType() {
    $reflection = new \ReflectionClass(static::class);
    return strtolower($reflection->getShortName());
  }

  /**
   * {@inheritdoc}
   */
  public static function getPropertyMapDefinition() {
    if (!isset(static::$propertyMapDefinition))  {
      static::$propertyMapDefinition = new PropertyMapDefinition();
      static::initPropertyMapDefinition();
    }
    return static::$propertyMapDefinition;
  }

  /**
   * Initialize the property map definition for this entity type.
   *
   * @return void
   */
  abstract protected static function initPropertyMapDefinition();

  /**
   * Reverse map a property that is an entity.
   *
   * @param array $entity
   *   The entity to reverse map.
   * @param mixed $context
   *   The context for this mapping. Usually the raw entity this property is
   *   from.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return mixed
   *   The reverse mapped value for this property, usually the entity id.
   */
  public static function reverse($entity, $context, EntityManagerInterface $entityManager) {
    $data = ($entity instanceof EntityInterface) ? $entity->raw() : $entity;
    return $data->id;
  }

  /**
   * Reverse map a property that is an array of entities.
   *
   * @param array $entities
   *   The entities to reverse map.
   * @param mixed $context
   *   The context for this mapping. Usually the raw entity.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return array
   *   The reverse mapped value for this property, usually an array of ids.
   */
  public static function reverseArray(array $entities, $context, EntityManagerInterface $entityManager) {
    $reversedEntities = array();
    foreach ($entities as $entity) {
      $reversedEntities[] = static::reverse($entity, $context, $entityManager);
    }
    return $reversedEntities;
  }

  /**
   * Transforms a property value to an entity.
   *
   * @param mixed $value
   *   The value to transform.
   * @param \stdClass $context
   *   The context for this mapping. Usually the raw entity as defined by the
   *   sportsdb api this property is from.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   * @param string $entityType
   *   The enitity type to transform this value to.
   * @param string $idName
   *   The name of the identifier property as defined by the sportsdb api.
   * @param array $contextPropertyMap
   *   Extra properties to map from the context
   *
   * @return \TheSportsDb\Entity\EntityInterface
   *   The mapped entity.
   */
  public static function transform($value, $context, EntityManagerInterface $entityManager, $entityType, $idName, array $contextPropertyMap = array()) {
    $data = static::transformHelper($value, $context, $idName, $contextPropertyMap);
    $entity = $entityManager->repository($entityType)->byId($data['id']);
    // Update with given values.
    $entity->update($data['object']);
    return $entity;
  }

  /**
   * Helper function to transform an entity.
   *
   * @param mixed $value
   *   The value to transform.
   * @param \stdClass $context
   *   The context for this mapping. Usually the raw entity as defined by the
   *   sportsdb api this property is from.
   * @param string $idName
   *   The name of the identifier property as defined by the sportsdb api.
   * @param array $contextPropertyMap
   *   Extra properties to map from the context
   *
   * @return array
   *   An array with following keys:
   *     - object: The raw data representing the entity.
   *     - id: The id of the entity.
   */
  public static function transformHelper($value, $context, $idName, array $contextPropertyMap = array()) {
    $data = array();
    $data['id'] = is_object($value) ? $value->{$idName} : $value;
    $data['object'] = is_object($value) ? $value : (object) array($idName => $data['id']);
    foreach ($contextPropertyMap as $source => $dest) {
      if (isset($context->{$source})) {
        $data['object']->{$dest} = $context->{$source};
      }
    }
    return $data;
  }
}
