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
   * Load all leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   An array of leagues.
   */
  public function all();

  /**
   * Load leagues by country.
   *
   * @param $country
   *   The country of the league.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The matched leagues.
   */
  public function byCountry($country);

  /**
   * Load leagues by country.
   *
   * @param $country
   *   The country of the league.
   * @param $sport
   *   The sport of the league.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The matched leagues.
   */
  public function byCountryAndSport($country, $sport);

  /**
   * Load leagues by country.
   *
   * @param $sport
   *   The sport of the league.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The matched leagues.
   */
  public function bySport($sport);
}
