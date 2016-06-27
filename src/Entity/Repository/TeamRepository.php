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

  /**
   * {@inheritdoc}
   */
  protected $entityType = 'team';

  /**
   * {@inheritdoc}
   */
  public function byName($name) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('searchteams.php', array('t' => $name))->teams);
  }

  /**
   * {@inheritdoc}
   */
  public function byLeagueName($leagueName) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_teams.php', array('l' => $leagueName))->teams);
  }

  /**
   * {@inheritdoc}
   */
  public function bySportAndCountry($sport, $country) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_teams.php', array('s' => $sport, 'c' => $country))->teams);
  }

  /**
   * {@inheritdoc}
   */
  public function byLeague($leagueId) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('lookup_all_teams.php', array('id' => $leagueId))->teams);
  }

}
