<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\SportProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\LeagueInterface;
use TheSportsDb\Entity\SportInterface;

/**
 * A sport object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class SportProxy extends Proxy implements SportInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    throw new \Exception('Could not fully load sport with id ' . $this->properties->id . '.');
  }

  protected function loadLeagues() {
    $leagueData = $this->sportsDbClient->doRequest('search_all_leagues.php', array('s' => urlencode(strtolower($this->properties->id))));
    if (isset($leagueData->countrys)) {
      $this->update($this->entityManager->mapProperties((object) array('leagues' => $leagueData->countrys), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load sport with id ' . $this->properties->id . '.');
  }

  public function getId() {
    return $this->get('id');
  }

  public function getLeagues() {
    return $this->get('leagues');
  }

  public function getName() {
    return $this->get('name');
  }

  /**
   * {@inheritdoc}
   */
  public function addLeague(LeagueInterface $league) {
    if ($this->entity) {
      $this->entity->addLeague($league);
      return;
    }
    if (!isset($this->properties->leagues)) {
      $this->properties->leagues = array();
    }
    if (!isset($this->properties->leagues[$league->getId()])) {
      $this->properties->leagues[$league->getId()] = $league;
    }
  }

}
