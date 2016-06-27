<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\PlayerRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default PlayerRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class PlayerRepository extends Repository implements PlayerRepositoryInterface {

  protected $entityType = 'player';

  public function byTeamName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('t' => $name))->player);
  }

  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('p' => $name))->player);
  }

  public function byTeamNameAndName($teamName, $name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('p' => $name, 't' => $teamName))->player);
  }

  public function byTeam($teamId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('lookup_all_players.php', array('id' => $teamId))->player);
  }

}
