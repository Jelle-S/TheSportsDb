<?php
/**
 * @file
 * Contains \TheSportsDb\Repository\RepositoryContainerInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * An interface for repository containers.
 *
 * @author Jelle Sebreghts
 */
interface RepositoryContainerInterface {

  /**
   * Add a repository for a class.
   *
   * @param \TheSportsDb\Repository\RepositoryInterface $repository
   *   The repository to add.
   */
  public function addRepository(RepositoryInterface $repository);

  /**
   * Get the repository for a class.
   *
   * @param string $class
   *   The fully qualified classname this repository is for.
   *
   * @throws \Exception
   *   When the repository for this class is not registered.
   *
   * @return \TheSportsDb\Repository\RepositoryInterface
   *   The repository for this class.
   */
  public function getRepository($class);
}
