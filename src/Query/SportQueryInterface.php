<?php
/**
 * @file
 * Contains \TheSportsDb\Query\SportQueryInterface.
 */

namespace TheSportsDb\Query;

/**
 * The main interface for SportQuery objects.
 *
 * @author Jelle Sebreghts
 */
interface SportQueryInterface extends QueryInterface {
  /**
   * Loads all sports.
   *
   * @return \TheSportsDb\Entity\SportInterface[]
   *   An array of sports.
   */
  public function all();
}
