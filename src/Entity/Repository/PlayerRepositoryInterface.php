<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\PlayerRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for PlayerRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface PlayerRepositoryInterface extends RepositoryInterface {
  public function byTeamName($name);

  public function byName($name);

  public function byTeamNameAndName($teamName, $name);
}
