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

  /**
   * The entity type for this repository.
   *
   * @var string
   */
  protected $entityType = 'league';

  /**
   * {@inheritdoc}
   */
  public function all() {
    return $this->normalizeArray($this->sportsDbClient->doRequest('all_leagues.php')->leagues);
  }

  /**
   * {@inheritdoc}
   */
  public function byCountry($country) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('c' => $country))->countrys);
  }

  /**
   * {@inheritdoc}
   */
  public function byCountryAndSport($country, $sport) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('c' => $country, 's' => $sport))->countrys);
  }

  /**
   * {@inheritdoc}
   */
  public function bySport($sport) {
    return $this->normalizeArray($this->sportsDbClient->doRequest('search_all_leagues.php', array('s' => $sport))->countrys);
  }

}
