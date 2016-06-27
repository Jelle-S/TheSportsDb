<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\TeamProxy.
 */

namespace TheSportsDb\Entity\Proxy;

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
    throw new \Exception('Could not fully load team with id ' . $this->properties->id . '.');
  }

  /**
   * {@inheritdoc}
   */
  public function getAlternateName() {
    return $this->get('AlternateName');
  }

  /**
   * {@inheritdoc}
   */
  public function getBadge() {
    return $this->get('badge');
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
  public function getCountry() {
    return $this->get('country');
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
  public function getDivision() {
    return $this->get('division');
  }

  /**
   * {@inheritdoc}
   */
  public function getFacebook() {
    return $this->get('facebook');
  }

  /**
   * {@inheritdoc}
   */
  public function getFormedYear() {
    return $this->get('formedYear');
  }

  /**
   * {@inheritdoc}
   */
  public function getGender() {
    return $this->get('gender');
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
  public function getInstagram() {
    return $this->get('instagram');
  }

  /**
   * {@inheritdoc}
   */
  public function getJersey() {
    return $this->get('jersey');
  }

  /**
   * {@inheritdoc}
   */
  public function getKeywords() {
    return $this->get('keywords');
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
  public function getLogo() {
    return $this->get('logo');
  }

  /**
   * {@inheritdoc}
   */
  public function getManager() {
    return $this->get('manager');
  }

  /**
   * {@inheritdoc}
   */
  public function getRss() {
    return $this->get('rss');
  }

  /**
   * {@inheritdoc}
   */
  public function getSport() {
    return $this->get('sport');
  }

  /**
   * {@inheritdoc}
   */
  public function getStadium() {
    return $this->get('stadium');
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumCapacity() {
    return $this->get('stadiumCapacity');
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumDescription() {
    return $this->get('stadiumDescription');
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumLocation() {
    return $this->get('stadiumLocation');
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumThumb() {
    return $this->get('stadiumThumb');
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
  public function getTeamShort() {
    return $this->get('teamShort');
  }

  /**
   * {@inheritdoc}
   */
  public function getTwitter() {
    return $this->get('twitter');
  }

  /**
   * {@inheritdoc}
   */
  public function getWebsite() {
    return $this->get('website');
  }

  /**
   * {@inheritdoc}
   */
  public function getYoutube() {
    return $this->get('youtube');
  }

}
