<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityInterface.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * Description of Entity
 *
 * @author drupalpro
 */
abstract class Entity implements EntityInterface {

  protected static $propertyMapDefinition = array();

  /**
   * Creates a new Entity object.
   *
   * @param \stdClass $values
   *   The entity data.
   */
  public function __construct(\stdClass $values) {
    $this->update($values);
  }

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
          $this->_raw->{$prop} = $val;
          if (method_exists($val, 'raw')) {
            $this->_raw->{$prop} = $val->raw();
          }
          elseif (is_array($val)) {
            $this->_raw->{$prop} = array();
            foreach ($val as $v) {
              $this->_raw->{$prop}[] = method_exists($v, 'raw') ? $v->raw() : $v;
            }
          }
        }
      }
    }
    return $this->_raw;
  }

  public function update(\stdClass $values) {
    foreach ((array) $values as $prop => $val) {
      if (property_exists($this, $prop)) {
        $this->{$prop} = $val;
      }
    }
  }

  public static function getEntityType() {
    $reflection = new \ReflectionClass(static::class);
    return strtolower($reflection->getShortName());
  }

  public static function getPropertyMapDefinition() {
    return static::$propertyMapDefinition;
  }

  public static function reverse($entity, $context, EntityManagerInterface $entityManager) {
    $data = ($entity instanceof EntityInterface) ? $entity->raw() : $entity;
    return $data->id;
  }

  public static function reverseArray(array $entities, $context, EntityManagerInterface $entityManager) {
    $reversedEntities = array();
    foreach ($entities as $entity) {
      $reversedEntities[] = static::reverse($entity, $context, $entityManager);
    }
    return $reversedEntities;
  }

  /**
   * @param string $entityType
   * @param string $idName
   */
  public static function transform($value, $context, EntityManagerInterface $entityManager, $entityType, $idName, array $contextPropertyMap = array()) {
    $data = static::transformHelper($value, $context, $idName, $contextPropertyMap);
    $entity = $entityManager->repository($entityType)->byId($data['id']);
    // Update with given values.
    $entity->update($data['object']);
    return $entity;
  }

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
