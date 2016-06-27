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

  public function getLeaguesByCountry($country) {
    return $this->entityManager->repository('league')->byCountry($country);
  }

  public function getLeaguesBySport($sport) {
    return $this->entityManager->repository('league')->bySport($sport);
  }

  public function getLeaguesByCountryAndSport($country, $sport) {
    return $this->entityManager->repository('league')->byCountryAndSport($country, $sport);
  }

  public function getTeam($teamId) {
    return $this->entityManager->repository('team')->byId($teamId);
  }

    public function getTeamByName($teamName) {
    return $this->entityManager->repository('team')->byName($teamName);
  }

  public function getTeamsByLeague($leagueId) {
    return $this->entityManager->repository('team')->byLeague($leagueId);
  }

  public function getTeamsByLeagueName($leagueName) {
    return $this->entityManager->repository('team')->byLeagueName($leagueName);
  }

  public function getTeamsBySportAndCountry($sport, $country) {
    return $this->entityManager->repository('team')->bySportAndCountry($sport, $country);
  }

  public function getPlayer($playerId) {
    return $this->entityManager->repository('player')->byId($playerId);
  }

  public function getPlayersByTeam($teamId) {
    return $this->entityManager->repository('player')->byTeam($teamId);
  }

  public function getPlayersByTeamName($teamName) {
    return $this->entityManager->repository('player')->byTeamName($teamName);
  }

  public function getPlayersByName($teamName) {
    return $this->entityManager->repository('player')->byName($teamName);
  }

  public function getPlayersByTeamNameAndName($teamName, $name) {
    return $this->entityManager->repository('player')->byTeamNameAndName($teamName, $name);
  }

  public function getEvent($eventId) {
    return $this->entityManager->repository('event')->byId($eventId);
  }

  public function getEventsByName($name) {
    return $this->entityManager->repository('event')->byName($name);
  }

  public function getEventsByFileName($name) {
    return $this->entityManager->repository('event')->byFileName($name);
  }

  public function getEventsByNameAndSeason($name, $season) {
    return $this->entityManager->repository('event')->byNameAndSeason($name, $season);
  }

  public function getNextFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->nextFiveByTeam($teamId);
  }

  public function getNextFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeague($leagueId);
  }

  public function getNextFifteenEventsByLeagueAndRound($leagueId, $round) {
    return $this->entityManager->repository('event')->nextFifteenEventsByLeagueAndRound($leagueId, $round);
  }

  public function getLastFiveEventsByTeam($teamId) {
    return $this->entityManager->repository('event')->lastFiveByTeam($teamId);
  }

  public function getLastFifteenEventsByLeague($leagueId) {
    return $this->entityManager->repository('event')->lastFifteenEventsByLeague($leagueId);
  }

  public function getEventsByDay(\DateTime $date, $sport = NULL, $leagueName = NULL) {
    return $this->entityManager->repository('event')->byDay($date, $sport, $leagueName);
  }

  public function getEventsByLeagueRoundAndSeason($leagueId, $round, $season) {
    return $this->entityManager->repository('event')->byLeagueRoundAndSeason($leagueId, $round, $season);
  }

  public function getEventsByLeagueAndSeason($leagueId, $season) {
    return $this->entityManager->repository('event')->byLeagueAndSeason($leagueId, $season);
  }

  public function getSeasonsByLeague($leagueId) {
    return $this->entityManager->repository('season')->byLeague($leagueId);
  }
}
