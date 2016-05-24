<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\SportFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for sport factories.
 *
 * @author Jelle Sebreghts
 */
interface SportFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\SportInterface object based on given values.
   *
   * @param \stdClass $values
   *   The sport object as returned by the service.
   *
   * @return \TheSportsDb\Entity\SportInterface
   *   The sport object.
   */
  public function create(\stdClass $values);
}
