<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\SportInterface.
 */

namespace TheSportsDb\Entity;


/**
 * Interface for sports.
 *
 * @author Jelle Sebreghts
 */
interface SportInterface extends EntityInterface {

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
   * Gets the leagues of this sport.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The leagues of this sport.
   */
  public function getLeagues();

  /**
   * Add a league to this sport.
   *
   * @param \TheSportsDb\Entity\LeagueInterface $league
   *   The league to add.
   *
   * @return void
   */
  public function addLeague(LeagueInterface $league);
}
