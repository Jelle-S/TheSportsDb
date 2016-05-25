<?php
/**
 * @file
 * The main sportsdb class.
 */

namespace TheSportsDb;

use TheSportsDb\Query\SportQueryInterface;
use TheSportsDb\Query\LeagueQueryInterface;
/**
 * Main API class for TheSportsDb.
 *
 * @author Jelle Sebreghts
 */
class TheSportsDb {

  /**
   * The sport query.
   *
   * @var TheSportsDb\Query\SportQueryInterface
   */
  protected $sportQuery;

  /**
   * The league query.
   *
   * @var TheSportsDb\Query\LeagueQueryInterface
   */
  protected $leagueQuery;

  /**
   * Creates a new TheSportsDb instance
   */
  public function __construct(SportQueryInterface $sportQuery, LeagueQueryInterface $leagueQuery) {
    $this->sportQuery = $sportQuery;
    $this->leagueQuery = $leagueQuery;
  }

  public function getSports() {
    return $this->sportQuery->all();
  }

  /**
   * Get a sport by name.
   *
   * @param string $name
   *   The sport name.
   *
   * @return \TheSportsDb\Entity\SportInterface
   */
  public function getSport($name) {
    return $this->sportQuery->byId($name);
  }

  public function getLeagues() {
    return $this->leagueQuery->all();
  }

  /**
   * Get a league by id.
   *
   * @param int $league_id
   *   The league id.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   */
  public function getLeague($league_id) {
    return $this->leagueQuery->byId($league_id);
  }
}
