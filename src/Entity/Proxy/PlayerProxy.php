<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\Player.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\PlayerInterface;

/**
 * A fully loaded player object.
 *
 * @author Jelle Sebreghts
 */
class PlayerProxy extends Proxy implements PlayerInterface {

  /**
   * {@inheritdoc}
   */
  protected function load() {
    $playerData = $this->sportsDbClient->doRequest('lookupplayer.php', array('id' => $this->properties->id));
    if (isset($playerData->players)) {
      $this->update($this->entityManager->mapProperties(reset($playerData->players), $this->getEntityType()));
      return;
    }
    throw new \Exception('Could not fully load player with id ' . $this->properties->id . '.');
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
  public function getTeam() {
    return $this->get('team');
  }

  /**
   * {@inheritdoc}
   */
  public function getNationality() {
    return $this->get('nationality');
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
  public function getSport() {
    return $this->get('sport');
  }

  /**
   * {@inheritdoc}
   */
  public function getBirthDay() {
    return $this->get('birthDay');
  }

  /**
   * {@inheritdoc}
   */
  public function getDateSigned() {
    return $this->get('dateSigned');
  }

  /**
   * {@inheritdoc}
   */
  public function getSigning() {
    return $this->get('signing');
  }

  /**
   * {@inheritdoc}
   */
  public function getWage() {
    return $this->get('wage');
  }

  /**
   * {@inheritdoc}
   */
  public function getBirthLocation() {
    return $this->get('birthLocation');
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
  public function getGender() {
    return $this->get('gender');
  }

  /**
   * {@inheritdoc}
   */
  public function getPosition() {
    return $this->get('position');
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
  public function getWebsite() {
    return $this->get('website');
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
  public function getInstagram() {
    return $this->get('instagram');
  }

  /**
   * {@inheritdoc}
   */
  public function getYoutube() {
    return $this->get('youtube');
  }

  /**
   * {@inheritdoc}
   */
  public function getHeight() {
    return $this->get('height');
  }

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->get('weight');
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
  public function getCutout() {
    return $this->get('cutout');
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->get('locked');
  }
}
