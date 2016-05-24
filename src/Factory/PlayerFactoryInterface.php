<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\PlayerFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for player factories.
 *
 * @author Jelle Sebreghts
 */
interface PlayerFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\PlayerInterface object based on given values.
   *
   * @param \stdClass $values
   *   The player object as returned by the service.
   *
   * @return \TheSportsDb\Entity\PlayerInterface
   *   The player object.
   */
  public function create(\stdClass $values);
}
