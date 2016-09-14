<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\EventProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EventInterface;

/**
 * An event object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class EventProxy extends Proxy implements EventInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $eventData = $this->sportsDbClient->doRequest('lookupevent.php', array('id' => $this->properties->id));
    if (isset($eventData->events)) {
      $this->update($this->entityManager->mapProperties(reset($eventData->events), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load event with id ' . $this->properties->id . '.');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayFormation() {
    return $this->get('awayFormation');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayGoalDetails() {
    return $this->get('awayGoalDetails');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupDefense() {
    return $this->get('awayLineupDefense');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupForward() {
    return $this->get('awayLineupForward');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupGoalkeeper() {
    return $this->get('awayLineupGoalkeeper');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupMidfield() {
    return $this->get('awayLineupMidfield');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupSubstitutes() {
    return $this->get('awayLineupSubstitutes');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayRedCards() {
    return $this->get('awayRedCards');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayScore() {
    return $this->get('awayScore');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayShots() {
    return $this->get('awayShots');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayTeam() {
    return $this->get('awayTeam');
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayYellowCards() {
    return $this->get('awayYellowCards');
  }

  /**
   * {@inheritdoc}
   */
  public function getBanner() {
    return $this->get('banner');
  }

  /**
   * {@inheritdoc}
   */
  public function getCircuit() {
    return $this->get('circuit');
  }

  /**
   * {@inheritdoc}
   */
  public function getCity() {
    return $this->get('city');
  }

  /**
   * {@inheritdoc}
   */
  public function getCountry() {
    return $this->get('country');
  }

  /**
   * {@inheritdoc}
   */
  public function getDate() {
    return $this->get('date');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->get('description');
  }

  /**
   * {@inheritdoc}
   */
  public function getFilename() {
    return $this->get('filename');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeFormation() {
    return $this->get('homeFormation');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeGoalDetails() {
    return $this->get('homeGoalDetails');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupDefense() {
    return $this->get('homeLineupDefense');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupForward() {
    return $this->get('homeLineupForward');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupGoalkeeper() {
    return $this->get('homeLineupGoalkeeper');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupMidfield() {
    return $this->get('homeLineupMidfield');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupSubstitutes() {
    return $this->get('homeLineupSubstitutes');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeRedCards() {
    return $this->get('homeRedCards');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeScore() {
    return $this->get('homeScore');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeShots() {
    return $this->get('homeShots');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeTeam() {
    return $this->get('homeTeam');
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeYellowCards() {
    return $this->get('homeYellowCards');
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
  public function getLeague() {
    return $this->get('league');
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->get('locked');
  }

  /**
   * {@inheritdoc}
   */
  public function getMap() {
    return $this->get('map');
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
  public function getPoster() {
    return $this->get('poster');
  }

  /**
   * {@inheritdoc}
   */
  public function getResult() {
    return $this->get('result');
  }

  /**
   * {@inheritdoc}
   */
  public function getRound() {
    return $this->get('round');
  }

  /**
   * {@inheritdoc}
   */
  public function getSeason() {
    return $this->get('season');
  }

  /**
   * {@inheritdoc}
   */
  public function getSpecators() {
    return $this->get('specators');
  }

  /**
   * {@inheritdoc}
   */
  public function getThumb() {
    return $this->get('thumb');
  }

  /**
   * {@inheritdoc}
   */
  public function getTime() {
    return $this->get('time');
  }

  /**
   * {@inheritdoc}
   */
  public function getTvStation() {
    return $this->get('tvStation');
  }
}
