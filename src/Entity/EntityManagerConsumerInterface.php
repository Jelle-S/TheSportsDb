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
   * setEntityManager
   * Insert description here
   *
   * @param EntityManagerInterface
   * @param $entityManager
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function setEntityManager(EntityManagerInterface $entityManager);
}
