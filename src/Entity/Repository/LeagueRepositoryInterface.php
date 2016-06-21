<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\LeagueRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for LeagueRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface LeagueRepositoryInterface extends RepositoryInterface {
  /**
   * Loads all leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   An array of leagues.
   */
  public function all();
}
