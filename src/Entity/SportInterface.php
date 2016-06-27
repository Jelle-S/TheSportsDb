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

  public function getId();

  public function getName();

  public function getLeagues();

  /**
   * Add a league to this sport.
   *
   * @param \TheSportsDb\Entity\LeagueInterface $league
   *   The league to add.
   * @return void
   */
  public function addLeague(LeagueInterface $league);
}
