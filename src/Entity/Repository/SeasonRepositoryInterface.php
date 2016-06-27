<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\SeasonRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for SeasonRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface SeasonRepositoryInterface extends RepositoryInterface {
  /**
   * Loads all seasons.
   *
   * @return \TheSportsDb\Entity\SeasonInterface[]
   *   An array of seasons.
   */
  public function all();

  public function byLeague($leagueId);
}
