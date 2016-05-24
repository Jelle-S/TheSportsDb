<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\SeasonInterface.
 */

namespace TheSportsDb\Entity;


/**
 * Interface for seasons.
 *
 * @author Jelle Sebreghts
 */
interface SeasonInterface extends EntityInterface {

  public function getId();

  public function getName();

  public function getEvents();

  public function getLeague();
}
