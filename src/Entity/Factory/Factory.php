<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Factory\Factory.
 */

namespace TheSportsDb\Entity\Factory;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;
use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Entity\Proxy\ProxyInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;

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
   * @var \TheSportsDb\Http\TheSportsDbClientInterface
   */
  protected $sportsDbClient;

  /**
   * Creates a \TheSportsDb\Facotory\Factory object.
   *
   * @param \TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   The sports db client to make the requests.
   * @param \TheSportsDb\Entity\EntityManagerInterface $entityManager
   *   The entity manager.
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
  public function create(\stdClass $values, $entityType) {
    // Check if we should return a proxy or a full entity.
    $reflection = !$this->entityManager->isFullObject($values, $entityType) ?
        new \ReflectionClass($this->entityManager->getClass($entityType, 'proxy'))
        : new \ReflectionClass($this->entityManager->getClass($entityType));

    $entity = $reflection->newInstance($values);
    $this->finalizeEntity($entity);

    return $entity;
  }

  /**
   * Finalize the entity (or proxy).
   *
   * @param \TheSportsDb\Entity\EntityInterface $entity
   *   Either the real or the proxy entity for this factory.
   *
   * @return void
   */
  protected function finalizeEntity(EntityInterface $entity) {
    if ($entity instanceof ProxyInterface) {
      $entity->setEntityManager($this->entityManager);
      $entity->setSportsDbClient($this->sportsDbClient);
    }
  }

  /**
   * Gets the entity manager of this factory.
   *
   * @return \TheSportsDb\Entity\EntityManagerInterface
   *   The entity manager for this factory.
   */
  public function getEntityManager() {
    return $this->entityManager;
  }

}
