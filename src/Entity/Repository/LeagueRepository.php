<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\LeagueRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default LeagueRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class LeagueRepository extends Repository implements LeagueRepositoryInterface {

  protected $entityType = 'league';

  /**
   * {@inheritdoc}
   */
  public function all() {
    return $this->normalizeArray($this->sportsDbClient->doRequest('all_leagues.php')->leagues);
  }

  public function byCountry($country) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('c' => $country))->countrys);
  }

  public function byCountryAndSport($country, $sport) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('c' => $country, 's' => $sport))->countrys);
  }

  public function bySport($sport) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('s' => $sport))->countrys);
  }

}
