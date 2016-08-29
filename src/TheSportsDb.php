<?php
/**
 * @file
 * The main sportsdb class.
 */

namespace TheSportsDb;

use TheSportsDb\Entity\EntityManagerConsumerInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;
use TheSportsDb\Entity\EntityManagerInterface;

/**
 * Main API class for TheSportsDb.
 *
 * @author Jelle Sebreghts
 */
class TheSportsDb implements EntityManagerConsumerInterface {

  use EntityManagerConsumerTrait;

  /**
   * Creates a new TheSportsDb instance
   */
  public function __construct(EntityManagerInterface $entityManager = NULL) {
    if ($entityManager instanceof EntityManagerInterface) {
      $this->entityManager = $entityManager;
    }
  }

  /**
   * getSports
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSports() {
    return $this->entityManager->repository('sport')->all();
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
    return $this->entityManager->repository('sport')->byId($name);
  }

  /**
   * getLeagues
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLeagues() {
    return $this->entityManager->repository('league')->all();
  }

  /**
   * Get a league by id.
   *
   * @param int $leagueId
   *   The league id.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   */
  public function getLeague($leagueId) {
    return $this->entityManager->repository('league')->byId($leagueId);
  }

  /**
   * getLeaguesByCountry
   * Insert description here
   *
   * @param $country
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLeaguesByCountry($country) {
    return $this->entityManager->repository('league')->byCountry($country);
  }

  /**
   * getLeaguesBySport
   * Insert description here
   *
   * @param $sport
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLeaguesBySport($sport) {
    return $this->entityManager->repository('league')->bySport($sport);
  }

  /**
   * getLeaguesByCountryAndSport
   * Insert description here
   *
   * @param $country
   * @param $sport
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLeaguesByCountryAndSport($country, $sport) {
    return $this->entityManager->repository('league')->byCountryAndSport($country, $sport);
  }

  /**
   * getTeam
   * Insert description here
   *
   * @param $teamId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTeam($teamId) {
    return $this->entityManager->repository('team')->byId($teamId);
  }

    /**
     * getTeamByName
     * Insert description here
     *
     * @param $teamName
     *
     * @return
     *
     * @access
     * @static
     * @see
     * @since
     */
    public function getTeamByName($teamName) {
    return $this->entityManager->repository('team')->byName($teamName);
  }

  /**
   * getTeamsByLeague
   * Insert description here
   *
   * @param $leagueId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTeamsByLeague($leagueId) {
    return $this->entityManager->repository('team')->byLeague($leagueId);
  }

  /**
   * getTeamsByLeagueName
   * Insert description here
   *
   * @param $leagueName
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTeamsByLeagueName($leagueName) {
    return $this->entityManager->repository('team')->byLeagueName($leagueName);
  }

  /**
   * getTeamsBySportAndCountry
   * Insert description here
   *
   * @param $sport
   * @param $country
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTeamsBySportAndCountry($sport, $country) {
    return $this->entityManager->repository('team')->bySportAndCountry($sport, $country);
  }

  /**
   * getPlayer
   * Insert description here
   *
   * @param $playerId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPlayer($playerId) {
    return $this->entityManager->repository('player')->byId($playerId);
  }

  /**
   * getPlayersByTeam
   * Insert description here
   *
   * @param $teamId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPlayersByTeam($teamId) {
    return $this->entityManager->repository('player')->byTeam($teamId);
  }

  /**
   * getPlayersByTeamName
   * Insert description here
   *
   * @param $teamName
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPlayersByTeamName($teamName) {
    return $this->entityManager->repository('player')->byTeamName($teamName);
  }

  /**
   * getPlayersByName
   * Insert description here
   *
   * @param $teamName
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPlayersByName($teamName) {
    return $this->entityManager->repository('player')->byName($teamName);
  }

  /**
   * getPlayersByTeamNameAndName
   * Insert description here
   *
   * @param $teamName
   * @param $name
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPlayersByTeamNameAndName($teamName, $name) {
    return $this->entityManager->repository('player')->byTeamNameAndName($teamName, $name);
  }

  /**
   * getEvent
   * Insert description here
   *
   * @param $eventId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEvent($eventId) {
    return $this->entityManager->repository('event')->byId($eventId);
  }

  /**
   * getEventsByName
   * Insert description here
   *
   * @param $name
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByName($name) {
    return $this->entityManager->repository('event')->byName($name);
  }

  /**
   * getEventsByFileName
   * Insert description here
   *
   * @param $name
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByFileName($name) {
    return $this->entityManager->repository('event')->byFileName($name);
  }

  /**
   * getEventsByNameAndSeason
   * Insert description here
   *
   * @param $name
   * @param $season
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByNameAndSeason($name, $season) {
    return $this->entityManager->repository('event')->byNameAndSeason($name, $season);
  }

  /**
   * getNextFiveEventsByTeam
   * Insert description here
   *
   * @param $teamId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getNextFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->nextFiveByTeam($teamId);
  }

  /**
   * getNextFifteenEventsByLeague
   * Insert description here
   *
   * @param $leagueId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getNextFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeague($leagueId);
  }

  /**
   * getNextFifteenEventsByLeagueAndRound
   * Insert description here
   *
   * @param $leagueId
   * @param $round
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getNextFifteenEventsByLeagueAndRound($leagueId, $round) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeagueAndRound($leagueId, $round);
  }

  /**
   * getLastFiveEventsByTeam
   * Insert description here
   *
   * @param $teamId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLastFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->lastFiveByTeam($teamId);
  }

  /**
   * getLastFifteenEventsByLeague
   * Insert description here
   *
   * @param $leagueId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLastFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->lastFifteenEventsByLeague($leagueId);
  }

  /**
   * getEventsByDay
   * Insert description here
   *
   * @param \
   * @param DateTime
   * @param $date
   * @param $sport
   * @param $leagueName
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByDay(\DateTime $date, $sport = NULL, $leagueName = NULL) {
    return $this->entityManager->repository('event')->byDay($date, $sport, $leagueName);
  }

  /**
   * getEventsByLeagueRoundAndSeason
   * Insert description here
   *
   * @param $leagueId
   * @param $round
   * @param $season
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByLeagueRoundAndSeason($leagueId, $round, $season) {
    return $this->entityManager->repository('event')->byLeagueRoundAndSeason($leagueId, $round, $season);
  }

  /**
   * getEventsByLeagueAndSeason
   * Insert description here
   *
   * @param $leagueId
   * @param $season
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getEventsByLeagueAndSeason($leagueId, $season) {
    return $this->entityManager->repository('event')->byLeagueAndSeason($leagueId, $season);
  }

  /**
   * getSeasonsByLeague
   * Insert description here
   *
   * @param $leagueId
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSeasonsByLeague($leagueId) {
    return $this->entityManager->repository('season')->byLeague($leagueId);
  }
}
