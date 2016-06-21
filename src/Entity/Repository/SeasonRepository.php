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
    $repoId = implode('|', $id);
    if (!isset($this->repository[$repoId])) {
      $factory = $this->entityManager->factory($this->getEntityTypeName());
      $this->repository[$repoId] = $factory->create(
        $this->entityManager->reverseMapProperties(
          (object) array('id' => $id),
          $this->getEntityTypeName()
        ),
        $this->getEntityTypeName()
      );
    }
    return $this->repository[$repoId];
  }

  /**
   * {@inheritdoc}
   */
  public function all() {
    // Loading all seasons without any further context is rediculous.
    return array();
  }
}
