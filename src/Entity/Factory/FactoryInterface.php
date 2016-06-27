<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Factory\FactoryInterface.
 */

namespace TheSportsDb\Entity\Factory;

use TheSportsDb\Entity\EntityManagerConsumerInterface;

/**
 * Interface for factories.
 *
 * @author Jelle Sebreghts
 */
interface FactoryInterface extends EntityManagerConsumerInterface {
  /**
   * Creates a sportsdb entity object based on given values.
   *
   * @param \stdClass $values
   *   The sport object as returned by the service.
   * @param string $entityType
   *   The entity type to create.
   *
   * @return  \TheSportsDb\Entity\EntityInterface
   *   The entity object.
   */
  public function create(\stdClass $values, $entityType);

   /**
   * Gets the entity manager of this factory.
   *
   * @return \TheSportsDb\Entity\EntityManagerInterface
   *   The entity manager for this factory.
   */
  public function getEntityManager();
}
