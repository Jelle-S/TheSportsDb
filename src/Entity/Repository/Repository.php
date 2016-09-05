<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\Repository.
 */

namespace TheSportsDb\Entity\Repository;

use TheSportsDb\Entity\EntityManagerConsumerTrait;
use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;

/**
 * Abstract Repository implementation to inherit from.
 *
 * @author Jelle Sebreghts
 */
abstract class Repository implements RepositoryInterface {

  use EntityManagerConsumerTrait;

  /**
   * The repository of entities.
   *
   * @var array
   */
  protected $repository;

  /**
   * The entity type for this repository.
   *
   * @var string
   */
  protected $entityType;

  /**
   * The sports db client.
   *
   * @var \TheSportsDb\Http\TheSportsDbClientInterface
   */
  protected $sportsDbClient;

  public function __construct(TheSportsDbClientInterface $sportsDbClient, EntityManagerInterface $entityManager = NULL) {
    $this->sportsDbClient = $sportsDbClient;
    if ($entityManager instanceof EntityManagerInterface) {
      $this->entityManager = $entityManager;
    }
    $this->repository = array();
  }

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    if (!isset($this->repository[$id])) {
      $factory = $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$id] = $factory->create(
        (object) array('id' => $id),
        $this->getEntityTypeName()
      );
    }
    return $this->repository[$id];
  }

  /**
   * {@inheritdoc}
   */
  public function clear($id) {
    unset($this->repository[$id]);
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityTypeName() {
    return $this->entityType;
  }

  /**
   * Gets the entity from cache or loads it & updates it with given data.
   *
   * @param \stdClass $data
   *   The data of the entity.
   *
   * @return \TheSportsDb\Entity\EntityInterface
   *   The matched entity.
   */
  protected function normalizeEntity(\stdClass $data) {
    $mapped = $this->entityManager->mapProperties($data, $this->getEntityTypeName());
    if (isset($this->repository[$mapped->id])) {
      $entity = $this->repository[$mapped->id];
      $entity->update($mapped);
      return $entity;
    }
    $factory = $this->entityManager->factory($this->getEntityTypeName());
    $this->repository[$mapped->id] = $factory->create($mapped, $this->getEntityTypeName());
    return $this->repository[$mapped->id];
  }

  /**
   * Gets an array of entities based on given data.
   *
   * @see \TheSportsDb\Entity\Repository\Repository::normilizeEntity()
   *
   * @param \stdClass[]|null $data
   *   The data of the entity.
   *
   * @return \TheSportsDb\Entity\EntityInterface[]
   *   The matched entities.
   */
  public function normalizeArray($data) {
    $normalized = array();
    if ($data) {
      foreach ($data as $raw) {
        $entity = $this->normalizeEntity($raw);
        $normalized[$entity->getId()] = $entity;
      }
    }
    return $normalized;
  }
}
