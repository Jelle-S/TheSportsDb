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
  public function setEntityManager(EntityManagerInterface $entityManager);
}
