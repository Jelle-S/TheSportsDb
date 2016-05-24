<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\Factory.
 */

namespace TheSportsDb\Factory;

use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\PropertyMapper\PropertyMapperContainerInterface;
use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\Proxy\ProxyInterface;

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
   * The property mapper.
   *
   * @var \TheSportsDb\PropertyMapper\PropertyMapperContainerInterface
   */
  protected $propertyMapperContainer;

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
   * Creates a \TheSportsDb\Facotory\Factory object.
   *
   * @param TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   A sports db client.
   * @param \TheSportsDb\PropertyMapper\PropertyMapperInterface $propertyMapper
   *   The property mapper.
   */
  public function __construct(TheSportsDbClientInterface $sportsDbClient, $realClass, $proxyClass) {
    $this->sportsDbClient = $sportsDbClient;
    $this->realClass = $realClass;
    $this->proxyClass = $proxyClass;
  }

  public function setPropertyMapperContainer(PropertyMapperContainerInterface $propertyMapperContainer) {
    $this->propertyMapperContainer = $propertyMapperContainer;
  }


  public function create(\stdClass $values) {
    $given_properties = $this->mapProperties($values);
    $reflection = new \ReflectionClass($this->realClass);
    $properties = $reflection->getDefaultProperties();
    // Not all properties are loaded, return a proxy.
    if (count(array_intersect_key($properties, (array) $given_properties)) < count($properties)) {
      $proxyReflection = new \ReflectionClass($this->proxyClass);
      $entity = $proxyReflection->newInstance($given_properties);
    }
    else {
      // All properties are loaded, return a full object.
      $entity = $reflection->newInstance($given_properties);
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
    return $this->propertyMapperContainer->getPropertyMapper($this->realClass)->map($values);
  }

  /**
   * {@inheritdoc}
   */
  public function reverseMapProperties(\stdClass $values) {
    return $this->propertyMapperContainer->getPropertyMapper($this->realClass)->reverseMap($values);
  }
}