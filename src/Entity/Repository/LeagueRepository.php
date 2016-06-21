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
    $leagues_data = $this->sportsDbClient->doRequest('all_leagues.php');
    $factory = $this->entityManager->factory($this->getEntityTypeName());
    foreach ($leagues_data->leagues as $league) {
      if (!isset($this->repository[$league->idLeague])) {
        $this->repository[$league->idLeague] = $factory->create($league, $this->getEntityTypeName());
      }
    }
    return $this->repository;
  }
}
