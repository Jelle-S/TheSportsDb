<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Player.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A fully loaded player object.
 *
 * @author Jelle Sebreghts
 */
class Player extends Entity implements PlayerInterface {

  protected static $propertyMapDefinition = array(
    array('idPlayer', 'id'),
    array('idTeam', 'team', array(
      array(self::class, 'transformTeam'),
      array(Team::class, 'reverse'),
    )),
    array('strNationality', 'nationality'),
    array('strPlayer', 'name'),
    array('strSport', 'sport', array(
      array(self::class, 'transformSport'),
      array(Sport::class, 'reverse'),
    )),
    array('dateBorn', 'birthDay'), // transform to date
    array('dateSigned', 'dateSigned'), // transform to date
    array('strSigning', 'signing'),
    array('strWage', 'wage'),
    array('strBirthLocation', 'birthLocation'),
    array('strDescriptionEN', 'description'),
    array('strGender', 'gender'),
    array('strPosition', 'position'),
    array('strFacebook', 'facebook'),
    array('strWebsite', 'website'),
    array('strTwitter', 'strTwitter'),
    array('strInstagram', 'instagram'),
    array('strYoutube', 'youtube'),
    array('strHeight', 'height'),
    array('strWeight', 'weight'),
    array('strThumb', 'thumb'),
    array('strCutout', 'strCutout'),
    array('strLocked', 'locked'),
    // strTeam
    // idSoccerXML
    // idPlayerManager
    // intSoccerXMLTeamID
    // strDescriptionDE
    // strDescriptionFR
    // strDescriptionCN
    // strDescriptionIT
    // strDescriptionJP
    // strDescriptionRU
    // strDescriptionES
    // strDescriptionPT
    // strDescriptionSE
    // strDescriptionNL
    // strDescriptionHU
    // strDescriptionNO
    // strDescriptionIL
    // strDescriptionPL
    // strCollege
    // intLoved
    // strFanart1
    // strFanart2
    // strFanart3
    // strFanart4
  );

  protected $id;
  protected $team;
  protected $nationality;
  protected $name;
  protected $sport;
  protected $birthDay;
  protected $dateSigned;
  protected $signing;
  protected $wage;
  protected $birthLocation;
  protected $description;
  protected $gender;
  protected $position;
  protected $facebook;
  protected $website;
  protected $twitter;
  protected $instagram;
  protected $youtube;
  protected $height;
  protected $weight;
  protected $thumb;
  protected $cutout;
  protected $locked;

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getTeam() {
    return $this->team;
  }

  /**
   * {@inheritdoc}
   */
  public function getNationality() {
    return $this->nationality;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getSport() {
    return $this->sport;
  }

  /**
   * {@inheritdoc}
   */
  public function getBirthDay() {
    return $this->birthDay;
  }

  /**
   * {@inheritdoc}
   */
  public function getDateSigned() {
    return $this->dateSigned;
  }

  /**
   * {@inheritdoc}
   */
  public function getSigning() {
    return $this->signing;
  }

  /**
   * {@inheritdoc}
   */
  public function getWage() {
    return $this->wage;
  }

  /**
   * {@inheritdoc}
   */
  public function getBirthLocation() {
    return $this->birthLocation;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function getGender() {
    return $this->gender;
  }

  /**
   * {@inheritdoc}
   */
  public function getPosition() {
    return $this->position;
  }

  /**
   * {@inheritdoc}
   */
  public function getFacebook() {
    return $this->facebook;
  }

  /**
   * {@inheritdoc}
   */
  public function getWebsite() {
    return $this->website;
  }

  /**
   * {@inheritdoc}
   */
  public function getTwitter() {
    return $this->twitter;
  }

  /**
   * {@inheritdoc}
   */
  public function getInstagram() {
    return $this->instagram;
  }

  /**
   * {@inheritdoc}
   */
  public function getYoutube() {
    return $this->youtube;
  }

  /**
   * {@inheritdoc}
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * {@inheritdoc}
   */
  public function getThumb() {
    return $this->thumb;
  }

  /**
   * {@inheritdoc}
   */
  public function getCutout() {
    return $this->cutout;
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->locked;
  }

  public static function transformTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strTeam' => 'strTeam'));
  }

  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'sport', 'strSport');
  }
}
