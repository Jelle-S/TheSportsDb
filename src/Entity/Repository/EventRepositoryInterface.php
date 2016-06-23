<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\EventRepositoryInterface.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The main interface for EventRepository objects.
 *
 * @author Jelle Sebreghts
 */
interface EventRepositoryInterface extends RepositoryInterface {
  public function byName($name);
  public function byFileName($fileName);
  public function byNameAndSeason($name, $season);
}
