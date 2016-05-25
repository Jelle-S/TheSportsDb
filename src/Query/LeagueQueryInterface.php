<?php
/**
 * @file
 * Contains \TheSportsDb\Query\LeagueQueryInterface.
 */

namespace TheSportsDb\Query;

/**
 * The main interface for LeagueQuery objects.
 *
 * @author Jelle Sebreghts
 */
interface LeagueQueryInterface extends QueryInterface {
  /**
   * Loads all leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   An array of leagues.
   */
  public function all();
}
