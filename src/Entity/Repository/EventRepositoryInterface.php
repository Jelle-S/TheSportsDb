<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\EventRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for EventRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface EventRepositoryInterface extends RepositoryInterface {

  /**
   * Load events by name.
   *
   * @param string $name
   *   The name of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byName($name);

  /**
   * Load events by filename.
   *
   * @param string $fileName
   *   The file name of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byFileName($fileName);

  /**
   * Load events by name and season.
   *
   * @param string $name
   *   The name of the event.
   * @param string $season
   *   The season of the event
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byNameAndSeason($name, $season);

  /**
   * Load events by day, sport and league.
   *
   * @param \DateTime $date
   *   The date of the event.
   * @param string|null $sport
   *   The sport of the event.
   * @param string|null $leagueName
   *   The name of the league of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byDay(\DateTime $date, $sport = NULL, $leagueName = NULL);

  /**
   * Get the next five events for a team.
   *
   * @param string $teamId
   *   The id of the team.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function nextFiveByTeam($teamId);

  /**
   * Load the next fifteen events by league.
   *
   * @param string $leagueId
   *   The id of the league of the events.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function nextFifteenEventsByLeague($leagueId);

  /**
   * Load the next fifteen events by league and round.
   *
   * @param string $leagueId
   *   The league id of the league of the event.
   * @param string round
   *   The round of the events.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function nextFifteenEventsByLeagueAndRound($leagueId, $round);

  /**
   * Load the last five events by team.
   *
   * @param string $teamId
   *   The id of the teams of the events.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function lastFiveByTeam($teamId);

  /**
   * Load the last fifteen events by league.
   *
   * @param string $leagueId
   *   The league id of the league of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function lastFifteenEventsByLeague($leagueId);

  /**
   * Load events by league, round and season.
   *
   * @param string $leagueId
   *   The league id of the league of the event.
   * @param string $round
   *   The round of the event.
   * @param string $season
   *   The season of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byLeagueRoundAndSeason($leagueId, $round, $season);

  /**
   * Load events by league and season.
   *
   * @param string $leagueId
   *   The league id of the league of the event.
   * @param string $season
   *   The season of the event.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   An array of matched events.
   */
  public function byLeagueAndSeason($leagueId, $season);
}
