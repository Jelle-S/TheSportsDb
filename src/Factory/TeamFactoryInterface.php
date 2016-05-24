<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\TeamFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for team factories.
 *
 * @author Jelle Sebreghts
 */
interface TeamFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\TeamInterface object based on given values.
   *
   * @param \stdClass $values
   *   The team object as returned by the service.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team object.
   */
  public function create(\stdClass $values);
}
