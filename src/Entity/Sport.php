<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Sport.
 */

namespace TheSportsDb\Entity;

/**
 * A fully loaded sport object.
 *
 * @author Jelle Sebreghts
 */
class Sport extends Entity implements SportInterface {

  protected $id;

  protected $name;

  protected $leagues = array();

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getLeagues() {
    return $this->leagues;
  }

  /**
   * {@inheritdoc}
   */
  public function addLeague(LeagueInterface $league) {
    if (!isset($this->leagues[$league->getId()])) {
      $this->leagues[$league->getId()] = $league;
    }
  }
}
