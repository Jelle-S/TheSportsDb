<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\EventRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default EventRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class EventRepository extends Repository implements EventRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  protected $entityType = 'event';

  /**
   * {@inheritdoc}
   */
  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchevents.php', array('e' => $name))->event);
  }

  /**
   * {@inheritdoc}
   */
  public function byFileName($fileName) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchfilename.php', array('e' => $fileName))->event);
  }

  /**
   * {@inheritdoc}
   */
  public function byNameAndSeason($name, $season) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchevents.php', array('e' => $name, 's' => $season))->event);
  }

  /**
   * {@inheritdoc}
   */
  public function nextFiveByTeam($teamId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsnext.php', array('id' => $teamId))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function nextFifteenEventsByLeague($leagueId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsnextleague.php', array('id' => $leagueId))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function nextFifteenEventsByLeagueAndRound($leagueId, $round) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsnextleague.php', array('id' => $leagueId, 'r' => $round))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function lastFiveByTeam($teamId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventslast.php', array('id' => $teamId))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function lastFifteenEventsByLeague($leagueId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventspastleague.php', array('id' => $leagueId))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function byDay(\DateTime $date, $sport = NULL, $leagueName = NULL) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsday.php', array('d' => $date->format('Y-m-d'), 's' => $sport, 'l' => $leagueName))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function byLeagueRoundAndSeason($leagueId, $round, $season) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsround.php', array('id' => $leagueId, 'r' => $round, 's' => $season))->events);
  }

  /**
   * {@inheritdoc}
   */
  public function byLeagueAndSeason($leagueId, $season) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsseason.php', array('id' => $leagueId, 's' => $season))->events);
  }

}
