<?php
/**
 * @file
 * Contains TheSportsDb\Entity\Factory\Factory.
 */

namespace TheSportsDb\Entity\Factory;

use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\Proxy\ProxyInterface;
use FastNorth\PropertyMapper\MapperInterface;
use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;

/**
 * Default implementation of factories.
 *
 * @author Jelle Sebreghts
 */
class Factory implements FactoryInterface {

  use EntityManagerConsumerTrait;

  /**
   * The sports db client.
   *
   * @var TheSportsDb\Http\TheSportsDbClientInterface
   */
  protected $sportsDbClient;

  /**
   * Creates a \TheSportsDb\Facotory\Factory object.
   *
   * @param TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   The sports db client to make the requests.
   * @param string $realClass
   *   The fully qualified classname of the entity to create.
   * @param string $proxyClass
   *   The fully qualified classname of the proxy entity to create.
   * @param TheSportsDb\Entity\EntityManagerInterface $entityManager
   *   The factory container.
   * @param MapperInterface $propertyMapper
   *   The property mapper.
   */
  public function __construct(TheSportsDbClientInterface $sportsDbClient, EntityManagerInterface $entityManager = NULL) {
    $this->sportsDbClient = $sportsDbClient;
    if ($entityManager instanceof EntityManagerInterface) {
      $this->entityManager = $entityManager;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values, $entityType, $mapProperties = TRUE) {
    $givenProperties = $mapProperties ? $this->entityManager->mapProperties($values, $entityType) : $values;

    // Check if we should return a proxy or a full entity.
    $reflection = !$this->isFullObject($givenProperties, $entityType) ?
        new \ReflectionClass($this->entityManager->getClass($entityType, 'proxy'))
        : new \ReflectionClass($this->entityManager->getClass($entityType));

    $entity = $reflection->newInstance($givenProperties);
    $this->finalizeEntity($entity);

    return $entity;
  }

  public function isFullObject(\stdClass $object, $entityType) {
    $reflection = new \ReflectionClass($this->entityManager->getClass($entityType));
    $defaultProperties = $reflection->getDefaultProperties();
    $properties = array_flip(array_filter(array_keys($defaultProperties), function($prop) use ($reflection) {
      // Filter out static properties.
      $reflectionProp = $reflection->getProperty($prop);
      if ($reflectionProp->isStatic()) {
        return FALSE;
      }
      return TRUE;
    }));
    return count(array_intersect_key($properties, (array) $object)) === count($properties);
  }

  /**
   * Finalize the entity (or proxy).
   *
   * @param \TheSportsDb\Entity\EntityInterface $entity
   *   Either the real or the proxy entity for this factory.
   */
  public function finalizeEntity(EntityInterface $entity) {
    if ($entity instanceof ProxyInterface) {
      $entity->setEntityManager($this->entityManager);
      $entity->setSportsDbClient($this->sportsDbClient);
    }
  }

  public function getEntityManager() {
    return $this->entityManager;
  }

}
