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
   * Gets all sports.
   *
   * @return \TheSportsDb\Entity\SportInterface[]
   *   The sports.
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
   *   The sport.
   */
  public function getSport($name) {
    return $this->entityManager->repository('sport')->byId($name);
  }

  /**
   * Gets all leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The leagues.
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
   *   The league.
   */
  public function getLeague($leagueId) {
    return $this->entityManager->repository('league')->byId($leagueId);
  }

  /**
   * Gets all leagues by country.
   *
   * @param string $country
   *   The country of which to get the leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The leagues.
   */
  public function getLeaguesByCountry($country) {
    return $this->entityManager->repository('league')->byCountry($country);
  }

  /**
   * Gets all leagues by sport.
   *
   * @param mixed $sport
   *   The sport of which to get the leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The leagues.
   */
  public function getLeaguesBySport($sport) {
    return $this->entityManager->repository('league')->bySport($sport);
  }

  /**
   * Gets all leagues by country and sport.
   *
   * @param string $country
   *   The country of which to get the leagues.
   * @param mixed $sport
   *   The sport of which to get the leagues.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The leagues.
   */
  public function getLeaguesByCountryAndSport($country, $sport) {
    return $this->entityManager->repository('league')->byCountryAndSport($country, $sport);
  }

  /**
   * Gets a team by id.
   *
   * @param mixed $teamId
   *   The team id.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team.
   */
  public function getTeam($teamId) {
    return $this->entityManager->repository('team')->byId($teamId);
  }

  /**
   * Gets a team by name.
   *
   * @param string $teamName
   *   The team name.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team.
   */
  public function getTeamByName($teamName) {
    return $this->entityManager->repository('team')->byName($teamName);
  }

  /**
   * Gets a teams by league id.
   *
   * @param mixed $leagueId
   *   The league id.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The teams.
   */
  public function getTeamsByLeague($leagueId) {
    return $this->entityManager->repository('team')->byLeague($leagueId);
  }

  /**
   * Gets a teams by league name.
   *
   * @param string $leagueName
   *   The league name.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The teams.
   */
  public function getTeamsByLeagueName($leagueName) {
    return $this->entityManager->repository('team')->byLeagueName($leagueName);
  }

  /**
   * Gets a teams by sport and country.
   *
   * @param mixed $sport
   *   The sport.
   * @param string $country
   *   The country.
   *
   * @return \TheSportsDb\Entity\TeamInterface[]
   *   The teams.
   */
  public function getTeamsBySportAndCountry($sport, $country) {
    return $this->entityManager->repository('team')->bySportAndCountry($sport, $country);
  }

  /**
   * Get a player by id.
   *
   * @param mixed $playerId
   *   The player id.
   *
   * @return \TheSportsDb\Entity\PlayerInterface
   *   The player.
   */
  public function getPlayer($playerId) {
    return $this->entityManager->repository('player')->byId($playerId);
  }

  /**
   * Get a players by team id.
   *
   * @param mixed $teamId
   *   The team id.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The players.
   */
  public function getPlayersByTeam($teamId) {
    return $this->entityManager->repository('player')->byTeam($teamId);
  }

  /**
   * Get a players by team name.
   *
   * @param mixed $teamName
   *   The team name.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The players.
   */
  public function getPlayersByTeamName($teamName) {
    return $this->entityManager->repository('player')->byTeamName($teamName);
  }

  /**
   * Get a players by name.
   *
   * @param mixed $name
   *   The name.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The players.
   */
  public function getPlayersByName($name) {
    return $this->entityManager->repository('player')->byName($name);
  }

  /**
   * Get a players by team and name.
   *
   * @param string $teamName
   *   The team name.
   * @param string $name.
   *   The name.
   *
   * @return \TheSportsDb\Entity\PlayerInterface[]
   *   The players.
   */
  public function getPlayersByTeamNameAndName($teamName, $name) {
    return $this->entityManager->repository('player')->byTeamNameAndName($teamName, $name);
  }

  /**
   * Get an event by id.
   *
   * @param mixed $eventId
   *   The event id.
   *
   * @return \TheSportsDb\Entity\EventInterface
   *   The event.
   */
  public function getEvent($eventId) {
    return $this->entityManager->repository('event')->byId($eventId);
  }

  /**
   * Get events by name.
   *
   * @param string $name
   *   The event name.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByName($name) {
    return $this->entityManager->repository('event')->byName($name);
  }

  /**
   * Get events by file name.
   *
   * @param string $name
   *   The file name.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByFileName($name) {
    return $this->entityManager->repository('event')->byFileName($name);
  }

  /**
   * Get events by name and season.
   *
   * @param string $name
   *   The event name.
   * @param mixed $season
   *   The season.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByNameAndSeason($name, $season) {
    return $this->entityManager->repository('event')->byNameAndSeason($name, $season);
  }

  /**
   * Get next five events by team.
   *
   * @param mixed $teamId
   *   The team id.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getNextFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->nextFiveByTeam($teamId);
  }

  /**
   * Get next fifteen events by league.
   *
   * @param mixed $leagueId
   *   The league id.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getNextFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeague($leagueId);
  }

  /**
   * Get next fifteen events by league and round.
   *
   * @param mixed $leagueId
   *   The league id.
   * @param int $round
   *   The round.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getNextFifteenEventsByLeagueAndRound($leagueId, $round) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeagueAndRound($leagueId, $round);
  }

  /**
   * Get last five events by team.
   *
   * @param mixed $teamId
   *   The team id.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getLastFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->lastFiveByTeam($teamId);
  }

  /**
   * Get last fifteen events by league.
   *
   * @param mixed $leagueId
   *   The league id.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getLastFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->lastFifteenEventsByLeague($leagueId);
  }

  /**
   * Get events by day.
   *
   * @param \DateTime $date
   *   The day.
   * @param mixed $sport
   *   The sport.
   * @param string $leagueName
   *   The league name.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByDay(\DateTime $date, $sport = NULL, $leagueName = NULL) {
    return $this->entityManager->repository('event')->byDay($date, $sport, $leagueName);
  }

  /**
   * Get events by league, round and season.
   *
   * @param mixed $leagueId
   *   The league id.
   * @param int $round
   *   The round.
   * @param mixed $season
   *   The season.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByLeagueRoundAndSeason($leagueId, $round, $season) {
    return $this->entityManager->repository('event')->byLeagueRoundAndSeason($leagueId, $round, $season);
  }

  /**
   * Get events by league and season.
   *
   * @param mixed $leagueId
   *   The league id.
   * @param mixed $season
   *   The season.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events.
   */
  public function getEventsByLeagueAndSeason($leagueId, $season) {
    return $this->entityManager->repository('event')->byLeagueAndSeason($leagueId, $season);
  }

  /**
   * Get seasons by league.
   *
   * @param mixed $leagueId
   *   The league id.
   *
   * @return \TheSportsDb\Entity\SeasonInterface[]
   *   The seasons.
   */
  public function getSeasonsByLeague($leagueId) {
    return $this->entityManager->repository('season')->byLeague($leagueId);
  }
}
