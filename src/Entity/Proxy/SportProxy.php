<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\SportProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Exception\TheSportsDbException;
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
    throw new TheSportsDbException('Could not fully load sport with id ' . $this->properties->id . '.');
  }

  protected function loadLeagues() {
    $league_data = $this->sportsDbClient->doRequest('search_all_leagues.php', array('s' => urlencode(strtolower($this->properties->id))));
    if (isset($league_data->countrys)) {
      $this->update($this->entityManager->mapProperties((object) array('leagues' => $league_data->countrys), $this->getEntityType()));
      return;
    }
    throw new TheSportsDbException('Could not fully load sport with id ' . $this->properties->id . '.');
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
    if (!$this->entity) {
      if (!isset($this->properties->leagues)) {
        $this->properties->leagues = array();
      }
      if (!isset($this->properties->leagues[$league->getId()])) {
        $this->properties->leagues[$league->getId()] = $league;
      }
    }
    else {
      $this->entity->addLeague($league);
    }
  }

}
