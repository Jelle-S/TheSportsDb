<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\LeagueFactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for league factories.
 *
 * @author Jelle Sebreghts
 */
interface LeagueFactoryInterface extends FactoryInterface {

  /**
   * Creates a \TheSportsDb\Entity\LeagueInterface object based on given values.
   *
   * @param \stdClass $values
   *   The league object as returned by the service.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league object.
   */
  public function create(\stdClass $values);
}
