<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\SportRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for SportRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface SportRepositoryInterface extends RepositoryInterface {

  /**
   * Loads all sports.
   *
   * @return \TheSportsDb\Entity\SportInterface[]
   *   An array of sports.
   */
  public function all();
}
