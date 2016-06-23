<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\TeamRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for TeamRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface TeamRepositoryInterface extends RepositoryInterface {
  public function byName($name);
  public function byLeagueName($leagueName);
}
