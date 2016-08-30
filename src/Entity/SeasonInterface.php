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

  /**
   * Gets the primary identifier.
   *
   * @return int
   *   The primary identifier.
   */
  public function getId();

  /**
   * Gets the name
   *
   * @return string
   *   The name.
   */
  public function getName();

  /**
   * Gets the events of this season.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The events of this season.
   */
  public function getEvents();

  /**
   * Gets the league of this season.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league of this season.
   */
  public function getLeague();
}
