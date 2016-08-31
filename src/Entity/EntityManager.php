<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityManager.
 */

namespace TheSportsDb\Entity;

use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\MapperInterface;
use TheSportsDb\Entity\Factory\FactoryContainerInterface;
use TheSportsDb\Entity\Repository\RepositoryContainerInterface;
use TheSportsDb\PropertyMapper\PropertyDefinition;
use TheSportsDb\PropertyMapper\Transformer\Callback;

/**
 * Default implementation for entity managers.
 *
 * @author Jelle Sebreghts
 */
class EntityManager implements EntityManagerInterface {

  /**
   * The factory container.
   *
   * @var \TheSportsDb\Entity\Factory\FactoryContainerInterface
   */
  protected $factoryContainer;

  /**
   * The repository container.
   *
   * @var \TheSportsDb\Entity\Repository\RepositoryContainerInterface
   */
  protected $repositoryContainer;

  /**
   * Map entity types to classes.
   *
   * @var array
   */
  protected $classes = array();

  /**
   * Property map definitions.
   *
   * @var array
   */
  protected $propertyMapDefinitions = array();

  /**
   * Property map definitions.
   *
   * @var array
   */
  protected $propertyMaps = array();

  /**
   * The property mapper.
   *
   * @var \FastNorth\PropertyMapper\MapperInterface
   */
  protected $propertyMapper;


  /**
   * Placeholder for empty properties.
   *
   * @var string
   */
  const EMPTYPROPERTYPLACEHOLDER = '__EMPTY_PROPERTY_PLACEHOLDER__';


  /**
   * {@inheritdoc}
   */
  public function __construct(MapperInterface $propertyMapper, FactoryContainerInterface $factoryContainer = NULL, RepositoryContainerInterface $repositoryContainer = NULL) {
    if ($factoryContainer instanceof FactoryContainerInterface) {
      $this->factoryContainer = $factoryContainer;
    }
    if ($repositoryContainer instanceof RepositoryContainerInterface) {
      $this->repositoryContainer = $repositoryContainer;
    }
    $this->propertyMapper = $propertyMapper;
  }

  /**
   * {@inheritdoc}
   */
  public function setFactoryContainer(FactoryContainerInterface $factoryContainer) {
    if ($this->factoryContainer instanceof FactoryContainerInterface) {
      throw new \Exception('Factory container already set.');
    }
    $this->factoryContainer = $factoryContainer;
  }

  /**
   * {@inheritdoc}
   */
  public function setRepositoryContainer(RepositoryContainerInterface $repositoryContainer) {
    if ($this->repositoryContainer instanceof RepositoryContainerInterface) {
      throw new \Exception('Repository container already set.');
    }
    $this->repositoryContainer = $repositoryContainer;
  }


  /**
   * {@inheritdoc}
   */
  public function repository($entityType) {
    if ($this->repositoryContainer instanceof RepositoryContainerInterface) {
      return $this->repositoryContainer->getRepository($entityType);
    }
    throw new \Exception('No repository container set.');
  }

  /**
   * {@inheritdoc}
   */
  public function factory($entityType) {
    if ($this->factoryContainer instanceof FactoryContainerInterface) {
      return $this->factoryContainer->getFactory($entityType);
    }
    throw new \Exception('No factory container set.');
  }

  /**
   * {@inheritdoc}
   */
  public function registerClass($entityType, $realClass = NULL, $proxyClass = NULL) {
    if (is_null($realClass)) {
      $realClass = (new \ReflectionClass(static::class))->getNamespaceName() . '\\' . ucfirst($entityType);
    }
    if (is_null($proxyClass)) {
      $proxyClass = (new \ReflectionClass($realClass))->getNamespaceName() . '\\Proxy\\' . ucfirst($entityType) . 'Proxy';
    }
    if (!class_exists($realClass)) {
      throw new \Exception('Class ' . $realClass . 'not found.');
    }
    if (!class_exists($proxyClass)) {
      throw new \Exception('Class ' . $proxyClass . 'not found.');
    }
    $this->classes[$entityType] = array(
      'real' => $realClass,
      'proxy' => $proxyClass
    );
    return $this->classes[$entityType];
  }

  /**
   * {@inheritdoc}
   */
  public function getPropertyMapDefinition($entityType) {
    if (!isset($this->propertyMapDefinitions[$entityType])) {
      $propertyMapDefinition = new \ReflectionMethod($this->getClass($entityType), 'getPropertyMapDefinition');
      $this->propertyMapDefinitions[$entityType] = $propertyMapDefinition->invoke(NULL);
    }
    return $this->propertyMapDefinitions[$entityType];
  }

  /**
   * {@inheritdoc}
   */
  public function getClass($entityType, $type = 'real') {
    if (!isset($this->classes[$entityType][$type])) {
      throw new \Exception(ucfirst($type) . ' class for ' . $entityType . ' not registered.');
    }
    return $this->classes[$entityType][$type];
  }

  /**
   * {@inheritdoc}
   */
  public function mapProperties(\stdClass $values, $entityType) {
    $mapped = new \stdClass();
    foreach ($this->getPropertyMapDefinition($entityType)->getPropertyMaps() as $map) {
      // The property on the destination must exist or it will not map.
      $mapped->{$map->getDestination()->getName()} = NULL;
      if (!isset($values->{$map->getSource()->getName()})) {
        // If a source property is not set, we must unset it on the destination
        // later on, so give it a value we can recognize.
        $values->{$map->getSource()->getName()} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    return $this->sanitizeObject($this->propertyMapper->process($values, $mapped, $this->getPropertyMap($entityType)));
  }


  /**
   * {@inheritdoc}
   */
  public function reverseMapProperties(\stdClass $values, $entityType) {
    $reversed = new \stdClass();
    foreach ($this->getPropertyMapDefinition($entityType)->getPropertyMaps() as $map) {
      if (!isset($reversed->{$map->getSource()->getName()})) {
        $reversed->{$map->getSource()->getName()} = static::EMPTYPROPERTYPLACEHOLDER;
      }
      if (!isset($values->{$map->getDestination()->getName()})) {
        $values->{$map->getDestination()->getName()} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    return $this->sanitizeObject($this->propertyMapper->reverse($reversed, $values, $this->getPropertyMap($entityType)));
  }

  /**
   * {@inheritdoc}
   */
  public function isFullObject(\stdClass $object, $entityType) {
    $reflection = new \ReflectionClass($this->getClass($entityType));
    $defaultProperties = $reflection->getDefaultProperties();
    $properties = array_flip(array_filter(array_keys($defaultProperties), function($prop) use ($reflection) {
      // Filter out static properties.
      return !$reflection->getProperty($prop)->isStatic();
    }));
    return count(array_intersect_key($properties, (array) $object)) === count($properties);
  }

  /**
   * Initializes the property map.
   *
   * @param string $entityType
   *   The entity type to initialize the property map for.
   *
   * @return void
   */
  protected function initPropertyMap($entityType) {
    $this->propertyMaps[$entityType] = new Map();
    $entityManager = $this;
    foreach ($this->getPropertyMapDefinition($entityType)->getPropertyMaps() as $map) {
      $args = [
        $map->getSource()->getName(),
        $map->getDestination()->getName(),
      ];
      if ($map->getTransform()) {
        $transform = $map->getTransform();
        $reverse = $map->getReverse();
        $args[] = new Callback(

          /**
           * @param string $value
           */
          function($value, $context) use ($entityManager, $transform) {
            if ($entityManager->isEmptyValue($value)) {
              return $value;
            }
            return call_user_func_array($transform, array($value, $context, $entityManager));
          },

          /**
           * @param string $value
           */
          function($value, $context) use ($entityManager, $reverse) {
            if ($entityManager->isEmptyValue($value)) {
              return $value;
            }
            return call_user_func_array($reverse, array($value, $context, $entityManager));
          }
        );
      }
      call_user_func_array(array($this->propertyMaps[$entityType], 'map'), $args);
    }
  }

  /**
   * Gets the property map.
   *
   * @param string $entityType
   *   The entity type to get the map for.
   *
   * @return \FastNorth\PropertyMapper\MapInterface
   *   The property map.
   */
  protected function getPropertyMap($entityType) {
    if (!isset($this->propertyMaps[$entityType])) {
      $this->initPropertyMap($entityType);
    }
    return $this->propertyMaps[$entityType];
  }

  /**
   * Sanitize empty values from an object.
   *
   * @param \stdClass $object
   *   The object to sanitize.
   *
   * @return \stdClass
   *   The sanitized object.
   */
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
  public function isEmptyValue($value) {
    return $value === static::EMPTYPROPERTYPLACEHOLDER;
  }

  /**
   * {@inheritdoc}
   */
  public function sanitizeValues(\stdClass &$values, $entityType) {
    foreach ($this->getPropertyMapDefinition($entityType)->getPropertyMaps() as $map) {
      $map->getDestination()->sanitizeProperty($values, $this->factoryContainer);
    }
  }
}
