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
    $team_data = $this->sportsDbClient->doRequest('searchteams.php', array('t' => $name));
    $teams = array();
    foreach ($team_data->teams as $team) {
      $mapped = $this->entityManager->mapProperties($team, $this->getEntityTypeName());
      if (isset($this->repository[$mapped->id])) {
        $teams[$mapped->id] = &$this->repository[$mapped->id];
      }
      else {
        $teams[$mapped->id] = $this->byId($mapped->id);
      }
      $teams[$mapped->id]->update($this->entityManager->mapProperties($team, $this->getEntityTypeName()));
    }
    return $teams;
  }

}
