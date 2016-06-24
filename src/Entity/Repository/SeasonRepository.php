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

  protected $entityType = 'season';

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    if (!isset($this->repository[$id])) {
      list($name, $league) = explode('|', $id);
      $factory = $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$id] = $factory->create(
        $this->entityManager->reverseMapProperties(
          (object) array('id' => $id, 'name' => $name, 'league' => (object) array('id' => $league)),
          $this->getEntityTypeName()
        ),
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
}
