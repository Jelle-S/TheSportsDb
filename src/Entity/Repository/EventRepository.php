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

  protected $entityType = 'event';
  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchevents.php', array('e' => $name))->event);
  }

  public function byFileName($fileName) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchfilename.php', array('e' => $fileName))->event);
  }

  public function byNameAndSeason($name, $season) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchevents.php', array('e' => $name, 's' => $season))->event);
  }

  public function nextFiveByTeam($teamId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsnext.php', array('id' => $teamId))->events);
  }

  public function nextFifteenEventsByLeague($leagueId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('eventsnextleague.php', array('id' => $leagueId))->events);
  }

}
