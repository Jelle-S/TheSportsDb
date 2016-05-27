<?php
/**
 * @file
 * Contains TheSportsDb\Factory\Factory.
 */

namespace TheSportsDb\Factory;

use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\Proxy\ProxyInterface;
use TheSportsDb\PropertyMapper\Transformer\Callback;
use FastNorth\PropertyMapper\MapperInterface;
use FastNorth\PropertyMapper\Map;

/**
 * Default implementation of factories.
 *
 * @author Jelle Sebreghts
 */
class Factory implements FactoryInterface {

  /**
   * The sports db client.
   *
   * @var TheSportsDb\Http\TheSportsDbClientInterface
   */
  protected $sportsDbClient;

  /**
   * The real class.
   *
   * @var string
   */
  protected $realClass;

  /**
   * The proxy class.
   *
   * @var string
   */
  protected $proxyClass;

  /**
   * The property map for this entity.
   *
   * @var FastNorth\PropertyMapper\MapInterface
   */
  protected $propertyMap;

  /**
   * The property mapper for this factory.
   *
   * @var FastNorth\PropertyMapper\MapperInterface
   */
  protected $propertyMapper;

  /**
   * The factory container.
   *
   * @var TheSportsDb\Factory\Factory\FactoryContainerInterface
   */
  protected $factoryContainer;

  protected $propertyMapDefinition;

  const EMPTYPROPERTYPLACEHOLDER = '__EMPTY_PROPERTY_PLACEHOLDER__';

  /**
   * Initializes the property map.
   */
  protected function initPropertyMap() {
    $this->propertyMap = new Map();
    foreach ($this->getPropertyMapDefinition() as $args) {
      if (isset($args[2]) && is_array($args[2])) {
        $factory = isset($args[3]) ? $this->factoryContainer->getFactory($args[3]) : NULL;
        $transform = $args[2][0];
        $reverse = $args[2][1];
        $args[2] = new Callback(
          function ($value, $context) use ($factory, $transform) {
            if ($factory->isEmptyValue($value)) {
              return $value;
            }
            return call_user_func_array($transform, array($value, $context, $factory));
          },
          function ($value, $context) use ($factory, $reverse) {
            if ($factory->isEmptyValue($value)) {
              return $value;
            }
            return call_user_func_array($reverse, array($value, $context, $factory));
          }
        );
      }
      call_user_func_array(array($this->propertyMap, 'map'), $args);
    }
  }

  protected function getPropertyMapDefinition() {
    if (!$this->propertyMapDefinition) {
      $propertyMapDefinition = new \ReflectionMethod($this->realClass, 'getPropertyMapDefinition');
      $this->propertyMapDefinition = $propertyMapDefinition->invoke(NULL);
    }
    return $this->propertyMapDefinition;
  }

  /**
   * Gets the property map.
   *
   * @return FastNorth\PropertyMapper\Map
   *   The property map.
   */
  protected function getPropertyMap() {
    if (!($this->propertyMap instanceof Map)) {
      $this->initPropertyMap();
    }
    return $this->propertyMap;
  }

  /**
   * Creates a \TheSportsDb\Facotory\Factory object.
   *
   * @param TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   The sports db client to make the requests.
   * @param string $realClass
   *   The fully qualified classname of the entity to create.
   * @param string $proxyClass
   *   The fully qualified classname of the proxy entity to create.
   * @param TheSportsDb\Factory\FactoryContainerInterface $factoryContainer
   *   The factory container.
   * @param MapperInterface $propertyMapper
   *   The property mapper.
   */
  public function __construct(TheSportsDbClientInterface $sportsDbClient, $realClass, $proxyClass, FactoryContainerInterface $factoryContainer, MapperInterface $propertyMapper) {
    $this->sportsDbClient = $sportsDbClient;
    $this->realClass = $realClass;
    $this->proxyClass = $proxyClass;
    $this->factoryContainer = $factoryContainer;
    $this->factoryContainer->addFactory($this);
    $this->propertyMapper = $propertyMapper;
  }

  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    $givenProperties = $this->mapProperties($values);
    $reflection = new \ReflectionClass($this->realClass);
    $defaultProperties = $reflection->getDefaultProperties();
    $properties = array_flip(array_filter(array_keys($defaultProperties), function($prop) use ($reflection) {
      // Filter out static properties.
      $reflectionProp = $reflection->getProperty($prop);
      if ($reflectionProp->isStatic()) {
        return FALSE;
      }
      return TRUE;
    }));
    // Not all properties are loaded, return a proxy.
    if (count(array_intersect_key($properties, (array) $givenProperties)) < count($properties)) {
      $proxyReflection = new \ReflectionClass($this->proxyClass);
      $entity = $proxyReflection->newInstance($givenProperties);
    }
    else {
      // All properties are loaded, return a full object.
      $entity = $reflection->newInstance($givenProperties);
    }

    $this->finalizeEntity($entity);

    return $entity;
  }

  /**
   * Finalize the entity (or proxy).
   *
   * @param \TheSportsDb\Entity\EntityInterface $entity
   *   Either the real or the proxy entity for this factory.
   */
  public function finalizeEntity(EntityInterface $entity) {
    if ($entity instanceof ProxyInterface) {
      $entity->setFactory($this);
      $entity->setSportsDbClient($this->sportsDbClient);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function mapProperties(\stdClass $values) {
    $mapped = new \stdClass();
    foreach ($this->getPropertyMapDefinition() as $propertyDefinition) {
      $mapped->{$propertyDefinition[1]} = NULL;
      if (!isset($values->{$propertyDefinition[0]})) {
        $values->{$propertyDefinition[0]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    return $this->sanitizeObject($this->propertyMapper->process($values, $mapped, $this->getPropertyMap()));
  }

  /**
   * {@inheritdoc}
   */
  public function reverseMapProperties(\stdClass $values) {
    $reversed = new \stdClass();
    foreach ($this->getPropertyMapDefinition() as $propertyDefinition) {
      if (!isset($reversed->{$propertyDefinition[0]})) {
        $reversed->{$propertyDefinition[0]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
      if (!isset($values->{$propertyDefinition[1]})) {
        $values->{$propertyDefinition[1]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    return $this->sanitizeObject($this->propertyMapper->reverse($reversed, $values, $this->getPropertyMap()));
  }

  protected function sanitizeObject(\stdClass $object) {
    $arr = (array) $object;
    foreach ($arr as $prop => $val) {
      if ($this->isEmptyValue($val)) {
        unset($arr[$prop]);
      }
    }
    return (object) $arr;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityTypeName() {
    $entityType = new \ReflectionMethod($this->realClass, 'getEntityType');
    return $entityType->invoke(NULL);
  }

  public function isEmptyValue($value) {
    return $value === static::EMPTYPROPERTYPLACEHOLDER;
  }

}