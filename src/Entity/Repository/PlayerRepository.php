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

  /**
   * {@inheritdoc}
   */
  protected $entityType = 'player';

  /**
   * {@inheritdoc}
   */
  public function byTeamName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('t' => $name))->player);
  }

  /**
   * {@inheritdoc}
   */
  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('p' => $name))->player);
  }

  /**
   * {@inheritdoc}
   */
  public function byTeamNameAndName($teamName, $name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchplayers.php', array('p' => $name, 't' => $teamName))->player);
  }

  /**
   * {@inheritdoc}
   */
  public function byTeam($teamId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('lookup_all_players.php', array('id' => $teamId))->player);
  }

}
