<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\SportRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default SportRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class SportRepository extends Repository implements SportRepositoryInterface {

  protected $entityType = 'sport';

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    if (!isset($this->repository[$id])) {
      $factory = $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$id] = $factory->create(
        (object) array('id' => $id, 'name' => $id),
        $this->getEntityTypeName()
      );
    }
    return $this->repository[$id];
  }

  /**
   * {@inheritdoc}
   */
  public function all() {
    $data = $this->sportsDbClient->doRequest('all_leagues.php');
    foreach ($data->leagues as $league) {
      if (!isset($this->repository[$league->strSport])) {
        $this->repository[$league->strSport] = $this->factory->create((object) array('id' => $league->strSport, 'name' => $league->strSport), $this->getEntityTypeName());
      }
    }
    return $this->repository;
  }
}
