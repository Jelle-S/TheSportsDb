<?php
/**
 * @file
 * Contains TheSportsDb\Entity\EntityManagerConsumerInterface.
 */
namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * The interface for entity manager consumers.
 *
 * @author Jelle Sebreghts
 */
interface EntityManagerConsumerInterface {

  /**
   * Set the entity manager.
   *
   * @param \TheSportsDb\Entity\EntityManagerInterface $entityManager
   *   The entity manager to set.
   *
   * @throws \Exception
   *   If the entity manager is already set.
   *
   * @return void
   */
  public function setEntityManager(EntityManagerInterface $entityManager);
}
