<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\RepositoryContainer.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default repository container implementation.
 *
 * @author Jelle Sebreghts
 */
class RepositoryContainer implements RepositoryContainerInterface {

  /**
   * Holds the repositories.
   *
   * @var \TheSportsDb\Entity\Repository\RepositoryInterface[]
   */
  protected $repositories = array();

  /**
   * {@inheritdoc}
   */
  public function addRepository(RepositoryInterface $repository) {
    $this->repositories[$repository->getEntityTypeName()] = $repository;
  }

  /**
   * {@inheritdoc}
   */
  public function getRepository($entityType) {
    if (!isset($this->repositories[$entityType])) {
      throw new \Exception('No repository registered for ' . $entityType);
    }
    return $this->repositories[$entityType];
  }
}
