<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\SeasonRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default SeasonRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class SeasonRepository extends Repository implements SeasonRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  protected $entityType = 'season';

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    if (!isset($this->repository[$id])) {
      list($name, $league) = explode('|', $id);
      $factory = $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$id] = $factory->create(
        (object) array('id' => $id, 'name' => $name, 'league' => (object) array('id' => $league)),
        $this->getEntityTypeName()
      );
    }
    return $this->repository[$id];
  }

  /**
   * {@inheritdoc}
   */
  public function all() {
    // Loading all seasons without any further context is rediculous.
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function byLeague($leagueId) {
    $data = $this->sportsDbClient->doRequest('search_all_seasons.php', array('id' => $leagueId))->seasons ?: array();
    foreach ($data as &$season) {
      $season->idLeague = $leagueId;
    }
    return $this->normalizeArray($data);
  }

}
