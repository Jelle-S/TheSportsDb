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

  /**
   * Loads all seasons of a league.
   *
   * @param string $leagueId
   *   The id of the league of the season.
   *
   * @return \TheSportsDb\Entity\SeasonInterface[]
   *   An array of seasons.
   */
  public function byLeague($leagueId);
}
