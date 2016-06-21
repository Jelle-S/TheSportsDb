<?php
/**
 * @file
 * The main sportsdb class.
 */

namespace TheSportsDb;

use TheSportsDb\Entity\EntityManagerInterface;
/**
 * Main API class for TheSportsDb.
 *
 * @author Jelle Sebreghts
 */
class TheSportsDb {

  /**
   * The entity manager.
   *
   * @var TheSportsDb\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Creates a new TheSportsDb instance
   */
  public function __construct(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
  }

  public function getSports() {
    return $this->entityManager->repository('sport')->all();
  }

  /**
   * Get a sport by name.
   *
   * @param string $name
   *   The sport name.
   *
   * @return \TheSportsDb\Entity\SportInterface
   */
  public function getSport($name) {
    return $this->entityManager->repository('sport')->byId($name);
  }

  public function getLeagues() {
    return $this->entityManager->repository('league')->all();
  }

  /**
   * Get a league by id.
   *
   * @param int $league_id
   *   The league id.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   */
  public function getLeague($league_id) {
    return $this->entityManager->repository('league')->byId($league_id);
  }
}
