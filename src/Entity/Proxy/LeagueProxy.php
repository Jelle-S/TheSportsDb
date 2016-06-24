<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\LeagueProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\LeagueInterface;

/**
 * A league object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class LeagueProxy extends Proxy implements LeagueInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $leagueData = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id));
    if (isset($leagueData->leagues)) {
      $this->update($this->entityManager->mapProperties(reset($leagueData->leagues), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load league with id ' . $this->properties->id . '.');
  }

  protected function loadSeasons() {
    $leagueData = $this->sportsDbClient->doRequest('lookupleague.php', array('id' => $this->properties->id, 's' => 'all'));
    if (isset($leagueData->leagues)) {
      $this->update($this->factory->mapProperties((object) array('seasons' => $leagueData->leagues)));
      return;
    }
    throw new \Exception('Could not fully load league with id ' . $this->properties->id . '.');
  }

  public function getAlternateName() {
    return $this->get('alternateName');
  }

  public function getBadge() {
    return $this->get('badge');
  }

  public function getBanner() {
    return $this->get('banner');
  }

  public function getCountry() {
    return $this->get('country');
  }

  public function getDateFirstEvent() {
    return $this->get('dateFirstEvent');
  }

  public function getDescription() {
    return $this->get('description');
  }

  public function getFacebook() {
    return $this->get('facebook');
  }

  public function getFormedYear() {
    return $this->get('formedYear');
  }

  public function getGender() {
    return $this->get('gender');
  }

  public function getId() {
    return $this->get('id');
  }

  public function getLocked() {
    return $this->get('locked');
  }

  public function getLogo() {
    return $this->get('logo');
  }

  public function getName() {
    return $this->get('name');
  }

  public function getNaming() {
    return $this->get('naming');
  }

  public function getPoster() {
    return $this->get('poster');
  }

  public function getRss() {
    return $this->get('rss');
  }

  public function getTrophy() {
    return $this->get('trophy');
  }

  public function getTwitter() {
    return $this->get('twitter');
  }

  public function getWebsite() {
    return $this->get('website');
  }

  public function getYoutube() {
    return $this->get('youtube');
  }

  public function getSeasons() {
    return $this->get('seasons');
  }

  public function getSport() {
    return $this->get('sport');
  }

}
