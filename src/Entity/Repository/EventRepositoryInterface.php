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
  public function byName($name);
  public function byFileName($fileName);
  public function byNameAndSeason($name, $season);
  public function byDay(\DateTime $date, $sport = NULL, $leagueName = NULL);
  public function nextFiveByTeam($teamId);
  public function nextFifteenEventsByLeague($leagueId);
  public function nextFifteenEventsByLeagueAndRound($leagueId, $round);
  public function lastFiveByTeam($teamId);
  public function lastFifteenEventsByLeague($leagueId);
  public function byLeagueRoundAndSeason($leagueId, $round, $season);
  public function byLeagueAndSeason($leagueId, $season);
}
