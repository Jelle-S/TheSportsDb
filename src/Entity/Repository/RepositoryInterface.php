<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\RepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

use TheSportsDb\Entity\EntityManagerConsumerInterface;
/**
 * The main interface for Repository objects.
 *
 * @author Jelle Sebreghts
 */
interface RepositoryInterface extends EntityManagerConsumerInterface {

  /**
   * Loads an entity by id.
   *
   * @param mixed $id
   *   The unique identifier for the entity to load.
   *
   * @return \TheSportsDb\Entity\EntityInterface
   *   The corresponding entity.
   *
   */
  public function byId($id);

  /**
   * Clear an entity from the repository.
   *
   * @param mixed $id
   */
  public function clear($id);


  /**
   * Get the entity type name this repository is for.
   *
   * @return string
   *   The entity type name of the entity this repository is for.
   */
  public function getEntityTypeName();
}
