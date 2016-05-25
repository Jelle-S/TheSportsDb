<?php
/**
 * @file
 * Contains \TheSportsDb\Query\QueryInterface.
 */

namespace TheSportsDb\Query;

/**
 * The main interface for Query objects.
 *
 * @author Jelle Sebreghts
 */
interface QueryInterface {

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
}
