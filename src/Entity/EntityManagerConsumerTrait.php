<?php
/**
 * @file
 * Contains TheSportsDb\Entity\EntityManagerConsumerTrait.
 */
namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A trait to use by entity manager consumers.
 *
 * @author Jelle Sebreghts
 */
trait EntityManagerConsumerTrait {

  /**
   * The entity manager.
   *
   * @var \TheSportsDb\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Set the entity manager.
   *
   * @param \TheSportsDb\Entity\EntityManagerInterface $entityManager
   *   The entity manager to set.
   *
   * @throws \Exception
   *   If the entity manager is already set.
   */
  public function setEntityManager(EntityManagerInterface $entityManager) {
    if ($this->entityManager instanceof EntityManagerInterface) {
      throw new \Exception('Entity manager already set.');
    }
    $this->entityManager = $entityManager;
  }
}
