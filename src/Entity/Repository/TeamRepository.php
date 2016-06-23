<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\TeamRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default TeamRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class TeamRepository extends Repository implements TeamRepositoryInterface {

  protected $entityType = 'team';
  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchteams.php', array('t' => $name))->teams);
  }

  public function byLeagueName($leagueName) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_teams.php', array('l' => $leagueName))->teams);
  }

}
