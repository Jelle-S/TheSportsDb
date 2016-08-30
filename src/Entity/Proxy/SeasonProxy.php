<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\SeasonProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\SeasonInterface;

/**
 * A season object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class SeasonProxy extends Proxy implements SeasonInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    throw new \Exception('Could not fully load season with id ' . $this->getId() . ' and league id ' . $this->getLeague()->getId() . '.');
  }

  /**
   * Lazy loads the events for this season.
   *
   * @throws \Exception
   *   When the events cannot be loaded.
   *
   * @return void
   */
  protected function loadEvents() {
    $id = explode('|', $this->getId());
    $eventData = $this->sportsDbClient->doRequest('eventsseason.php', array('id' => $this->getLeague()->getId(), 's' => reset($id)));
    if (isset($eventData->events)) {
      $this->update($this->entityManager->mapProperties((object) array('events' => $eventData->events), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load season with id ' . $this->getId() . ' and league id ' . $this->getLeague()->getId() . '.');
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->get('id');
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name');
  }

  /**
   * {@inheritdoc}
   */
  public function getEvents() {
    return $this->get('events');
  }

  /**
   * {@inheritdoc}
   */
  public function getLeague() {
    return $this->get('league');
  }

}
