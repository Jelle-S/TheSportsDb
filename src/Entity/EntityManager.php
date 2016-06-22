<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityManager.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\Factory\FactoryContainerInterface;
use TheSportsDb\Entity\Repository\RepositoryContainerInterface;
use FastNorth\PropertyMapper\MapperInterface;
use FastNorth\PropertyMapper\Map;
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
   * @var TheSportsDb\Entity\Factory\FactoryContainerInterface
   */
  protected $factoryContainer;
  
  /**
   * The repository container.
   * 
   * @var TheSportsDb\Entity\Repository\RepositoryContainerInterface
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

  protected $propertyMapper;


  const EMPTYPROPERTYPLACEHOLDER = '__EMPTY_PROPERTY_PLACEHOLDER__';


  public function __construct(MapperInterface $propertyMapper, FactoryContainerInterface $factoryContainer = NULL, RepositoryContainerInterface $repositoryContainer = NULL) {
    if ($factoryContainer instanceof FactoryContainerInterface) {
      $this->factoryContainer = $factoryContainer;
    }
    if ($repositoryContainer instanceof RepositoryContainerInterface) {
      $this->repositoryContainer = $repositoryContainer;
    }
    $this->propertyMapper = $propertyMapper;
  }

  public function setFactoryContainer(FactoryContainerInterface $factoryContainer) {
    if ($this->factoryContainer instanceof FactoryContainerInterface) {
      throw new \Exception('Factory container already set.');
    }
    $this->factoryContainer = $factoryContainer;
  }

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
    foreach ($this->getPropertyMapDefinition($entityType) as $propertyDefinition) {
      $mapped->{$propertyDefinition[1]} = NULL;
      if (!isset($values->{$propertyDefinition[0]})) {
        $values->{$propertyDefinition[0]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    return $this->sanitizeObject($this->propertyMapper->process($values, $mapped, $this->getPropertyMap($entityType)));
  }


  /**
   * {@inheritdoc}
   */
  public function reverseMapProperties(\stdClass $values, $entityType) {
    static $cache = array();
    if (isset($cache[$entityType][$values->id])) {
      $reversed = $cache[$entityType][$values->id];
    }
    else {
      $reversed = new \stdClass();
      $cache[$entityType][$values->id] = &$reversed;
    }
    foreach ($this->getPropertyMapDefinition($entityType) as $propertyDefinition) {
      if (!isset($reversed->{$propertyDefinition[0]})) {
        $reversed->{$propertyDefinition[0]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
      if (!isset($values->{$propertyDefinition[1]})) {
        $values->{$propertyDefinition[1]} = static::EMPTYPROPERTYPLACEHOLDER;
      }
    }
    $reversed = $this->sanitizeObject($this->propertyMapper->reverse($reversed, $values, $this->getPropertyMap($entityType)));
    return $reversed;
  }

  /**
   * Initializes the property map.
   */
  protected function initPropertyMap($entityType) {
    $this->propertyMaps[$entityType] = new Map();
    $entityManager = $this;
    foreach ($this->getPropertyMapDefinition($entityType) as $args) {
      if (isset($args[2]) && is_array($args[2])) {
        $transform = $args[2][0];
        $reverse = $args[2][1];
        $args[2] = new Callback(
          function ($value, $context) use ($entityManager, $transform) {
            if ($entityManager->isEmptyValue($value)) {
              return $value;
            }
            return call_user_func_array($transform, array($value, $context, $entityManager));
          },
          function ($value, $context) use ($entityManager, $reverse) {
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
   * @return FastNorth\PropertyMapper\Map
   *   The property map.
   */
  protected function getPropertyMap($entityType) {
    if (!isset($this->propertyMaps[$entityType])) {
      $this->initPropertyMap($entityType);
    }
    return $this->propertyMaps[$entityType];
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


  public function isEmptyValue($value) {
    return $value === static::EMPTYPROPERTYPLACEHOLDER;
  }
}
