<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\EventProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EventInterface;

/**
 * A sport object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class EventProxy extends Proxy implements EventInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $eventData = $this->sportsDbClient->doRequest('lookupevent.php', array('id' => $this->getId()));
    if (isset($eventData->events)) {
      $this->update($this->factory->mapProperties(reset($eventData->event)));
      return;
    }
    throw new \Exception('Could not fully load event with id ' . $this->properties->id . '.');
  }

  public function getAwayFormation() {
    return $this->get('awayFormation');
  }

  public function getAwayGoalDetails() {
    return $this->get('awayGoalDetails');
  }

  public function getAwayLineupDefense() {
    return $this->get('awayLineupDefense');
  }

  public function getAwayLineupForward() {
    return $this->get('awayLineupForward');
  }

  public function getAwayLineupGoalkeeper() {
    return $this->get('awayLineupGoalkeeper');
  }

  public function getAwayLineupMidfield() {
    return $this->get('awayLineupMidfield');
  }

  public function getAwayLineupSubstitutes() {
    return $this->get('awayLineupSubstitutes');
  }

  public function getAwayRedCards() {
    return $this->get('awayRedCards');
  }

  public function getAwayScore() {
    return $this->get('awayScore');
  }

  public function getAwayShots() {
    return $this->get('awayShots');
  }

  public function getAwayTeam() {
    return $this->get('awayTeam');
  }

  public function getAwayYellowCards() {
    return $this->get('awayYellowCards');
  }

  public function getBanner() {
    return $this->get('banner');
  }

  public function getCircuit() {
    return $this->get('circuit');
  }

  public function getCity() {
    return $this->get('city');
  }

  public function getCountry() {
    return $this->get('country');
  }

  public function getDate() {
    return $this->get('date');
  }

  public function getDescription() {
    return $this->get('description');
  }

  public function getFilename() {
    return $this->get('filename');
  }

  public function getHomeFormation() {
    return $this->get('homeFormation');
  }

  public function getHomeGoalDetails() {
    return $this->get('homeGoalDetails');
  }

  public function getHomeLineupDefense() {
    return $this->get('homeLineupDefense');
  }

  public function getHomeLineupForward() {
    return $this->get('homeLineupForward');
  }

  public function getHomeLineupGoalkeeper() {
    return $this->get('homeLineupGoalkeeper');
  }

  public function getHomeLineupMidfield() {
    return $this->get('homeLineupMidfield');
  }

  public function getHomeLineupSubstitues() {
    return $this->get('homeLineupSubstitutes');
  }

  public function getHomeRedCards() {
    return $this->get('homeRedCards');
  }

  public function getHomeScore() {
    return $this->get('homeScore');
  }

  public function getHomeShots() {
    return $this->get('homeShots');
  }

  public function getHomeTeam() {
    return $this->get('homeTeam');
  }

  public function getHomeYellowCards() {
    return $this->get('homeYellowCards');
  }

  public function getId() {
    return $this->get('id');
  }

  public function getLeague() {
    return $this->get('league');
  }

  public function getLocked() {
    return $this->get('locked');
  }

  public function getMap() {
    return $this->get('map');
  }

  public function getName() {
    return $this->get('name');
  }

  public function getPoster() {
    return $this->get('poster');
  }

  public function getResult() {
    return $this->get('result');
  }

  public function getRound() {
    return $this->get('round');
  }

  public function getSeason() {
    return $this->get('season');
  }

  public function getSpecators() {
    return $this->get('specators');
  }

  public function getThumb() {
    return $this->get('thumb');
  }

  public function getTime() {
    return $this->get('time');
  }

  public function getTvStation() {
    return $this->get('tvStation');
  }

}
