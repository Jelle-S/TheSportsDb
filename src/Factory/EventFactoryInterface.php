<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\EventFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for event factories.
 *
 * @author Jelle Sebreghts
 */
interface EventFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\EventInterface object based on given values.
   *
   * @param \stdClass $values
   *   The event object as returned by the service.
   *
   * @return \TheSportsDb\Entity\EventInterface
   *   The event object.
   */
  public function create(\stdClass $values);
}
