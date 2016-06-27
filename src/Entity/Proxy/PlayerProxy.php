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
    $playerData = $this->sportsDbClient->doRequest('lookuplayer.php', array('id' => $this->properties->id));
    if (isset($playerData->players)) {
      $this->update($this->entityManager->mapProperties(reset($playerData->players)), $this->getEntityType());
      return;
    }
    throw new \Exception('Could not fully load player with id ' . $this->properties->id . '.');
  }

  public function getId() {
    return $this->get('id');
  }

  public function getTeam() {
    return $this->get('team');
  }

  public function getNationality() {
    return $this->get('nationality');
  }

  public function getName() {
    return $this->get('name');
  }

  public function getSport() {
    return $this->get('sport');
  }

  public function getBirthDay() {
    return $this->get('birthDay');
  }

  public function getDateSigned() {
    return $this->get('dateSigned');
  }

  public function getSigning() {
    return $this->get('signing');
  }

  public function getWage() {
    return $this->get('wage');
  }

  public function getBirthLocation() {
    return $this->get('birthLocation');
  }

  public function getDescription() {
    return $this->get('description');
  }

  public function getGender() {
    return $this->get('gender');
  }

  public function getPosition() {
    return $this->get('position');
  }

  public function getFacebook() {
    return $this->get('facebook');
  }

  public function getWebsite() {
    return $this->get('website');
  }

  public function getTwitter() {
    return $this->get('twitter');
  }

  public function getInstagram() {
    return $this->get('instagram');
  }

  public function getYoutube() {
    return $this->get('youtube');
  }

  public function getHeight() {
    return $this->get('height');
  }

  public function getWeight() {
    return $this->get('weight');
  }

  public function getThumb() {
    return $this->get('thumb');
  }

  public function getCutout() {
    return $this->get('cutout');
  }

  public function getLocked() {
    return $this->get('locked');
  }
}
