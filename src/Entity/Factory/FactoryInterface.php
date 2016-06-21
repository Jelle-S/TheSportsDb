<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Factory\FactoryInterface.
 */

namespace TheSportsDb\Entity\Factory;

/**
 * Interface for factories.
 *
 * @author Jelle Sebreghts
 */
interface FactoryInterface {
  /**
   * Creates a sportsdb entity object based on given values.
   *
   * @param \stdClass $values
   *   The sport object as returned by the service.
   * @param string $entityType
   *   The entity type to create.
   *
   * @return mixed
   *   The entity object.
   */
  public function create(\stdClass $values, $entityType, $mapProperties = TRUE);

  public function getEntityManager();
}
