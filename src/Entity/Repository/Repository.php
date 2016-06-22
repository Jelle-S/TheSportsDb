<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\Repository.
 */

namespace TheSportsDb\Entity\Repository;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;

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

  protected $entityType;

  public function __construct(EntityManagerInterface $entityManager = NULL) {
    if ($this->entityManager instanceof EntityManagerInterface) {
      $this->entityManager = $entityManager;
    }
    $this->repository = array();
  }

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    if (!isset($this->repository[$id])) {
      $factory =  $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$id] = $factory->create(
        $this->entityManager->reverseMapProperties(
          (object) array('id' => $id),
          $this->getEntityTypeName()
        ),
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
}
