<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\TeamRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for TeamRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface TeamRepositoryInterface extends RepositoryInterface {

  /**
   * Load teams by name.
   *
   * @param string $name
   *   The name of the team.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The matched teams.
   */
  public function byName($name);

  /**
   * Load teams by league.
   *
   * @param string $leagueId
   *   The id of the league of the team.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The matched teams.
   */
  public function byLeague($leagueId);

  /**
   * Load teams by league name.
   *
   * @param string $leagueName
   *   The name of the league of the team.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The matched teams.
   */
  public function byLeagueName($leagueName);

  /**
   * Load teams by sport and country.
   *
   * @param string $sport
   *   The sport of the team.
   * @param string $country
   *   The country of the team.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The matched teams.
   */
  public function bySportAndCountry($sport, $country);
}
