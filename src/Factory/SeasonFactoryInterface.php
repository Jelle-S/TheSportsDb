<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\SeasonFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for season factories.
 *
 * @author Jelle Sebreghts
 */
interface SeasonFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\SeasonInterface object based on given values.
   *
   * @param \stdClass $values
   *   The season object as returned by the service.
   *
   * @return \TheSportsDb\Entity\SeasonInterface
   *   The season object.
   */
  public function create(\stdClass $values);
}
