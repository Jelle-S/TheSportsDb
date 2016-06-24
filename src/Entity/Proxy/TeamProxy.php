<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\TeamProxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Exception\TheSportsDbException;
use TheSportsDb\Entity\TeamInterface;

/**
 * A team object that is not yet fully loaded.
 *
 * @author Jelle Sebreghts
 */
class TeamProxy extends Proxy implements TeamInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $teamData = $this->sportsDbClient->doRequest('lookupteam.php', array('id' => $this->properties->id));
    if (isset($teamData->teams)) {
      $this->update($this->entityManager->mapProperties(reset($teamData->teams), $this->getEntityType()));
      return;
    }
    throw new TheSportsDbException('Could not fully load team with id ' . $this->properties->id . '.');
  }

  public function getAlternateName() {
    return $this->get('AlternateName');
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

  public function getDescription() {
    return $this->get('description');
  }

  public function getDivision() {
    return $this->get('division');
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

  public function getInstagram() {
    return $this->get('instagram');
  }

  public function getJersey() {
    return $this->get('jersey');
  }

  public function getKeywords() {
    return $this->get('keywords');
  }

  public function getLeague() {
    return $this->get('league');
  }

  public function getLocked() {
    return $this->get('locked');
  }

  public function getLogo() {
    return $this->get('logo');
  }

  public function getManager() {
    return $this->get('manager');
  }

  public function getRss() {
    return $this->get('rss');
  }

  public function getSport() {
    return $this->get('sport');
  }

  public function getStadium() {
    return $this->get('stadium');
  }

  public function getStadiumCapacity() {
    return $this->get('stadiumCapacity');
  }

  public function getStadiumDescription() {
    return $this->get('stadiumDescription');
  }

  public function getStadiumLocation() {
    return $this->get('stadiumLocation');
  }

  public function getStadiumThumb() {
    return $this->get('stadiumThumb');
  }

  public function getName() {
    return $this->get('name');
  }

  public function getTeamShort() {
    return $this->get('teamShort');
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

}
