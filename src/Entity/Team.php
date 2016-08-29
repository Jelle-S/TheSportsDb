<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Team.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A fully loaded team object.
 *
 * @author Jelle Sebreghts
 */
class Team extends Entity implements TeamInterface {

  /**
   * The property map definition.
   *
   * @var array
   */
  protected static $propertyMapDefinition = array(
    array('idTeam', 'id'),
    array('strTeam', 'name'),
    array('strTeamShort', 'teamShort'),
    array('strAlternateName', 'alternateName'),
    array('strFormedYear', 'formedYear'),
    array('strSport', 'sport', array(
      array(self::class, 'transformSport'),
      array(Sport::class, 'reverse'),
    )),
    array('idLeague', 'league', array(
      array(self::class, 'transformLeague'),
      array(League::class, 'reverse'),
    )),
    array('strDivision', 'division'),
    array('strManager', 'manager'),
    array('strStadium', 'stadium'),
    array('strKeywords', 'keywords'),
    array('strRSS', 'rss'),
    array('strStadiumThumb', 'stadiumThumb'),
    array('strStadiumDescription', 'stadiumDescription'),
    array('strStadiumLocation', 'stadiumLocation'),
    array('intStadiumCapacity', 'stadiumCapacity'),
    array('strWebsite', 'website'),
    array('strFacebook', 'facebook'),
    array('strTwitter', 'twitter'),
    array('strInstagram', 'instagram'),
    array('strDescriptionEN', 'description'),
    array('strGender', 'gender'),
    array('strCountry', 'country'),
    array('strTeamBadge', 'badge'),
    array('strTeamJersey', 'jersey'),
    array('strTeamLogo', 'logo'),
    array('strTeamBanner', 'banner'),
    array('strYoutube', 'youtube'),
    array('strLocked', 'locked'),
    // idSoccerXML
    // intLoved
    // strLeague
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
    // strTeamFanart1
    // strTeamFanart2
    // strTeamFanart3
    // strTeamFanart4
  );

  protected $id;
  protected $name;
  protected $teamShort;
  protected $alternateName;
  protected $formedYear;
  protected $sport;
  protected $league;
  protected $division;
  protected $manager;
  protected $stadium;
  protected $keywords;
  protected $rss;
  protected $stadiumThumb;
  protected $stadiumDescription;
  protected $stadiumLocation;
  protected $stadiumCapacity;
  protected $website;
  protected $facebook;
  protected $twitter;
  protected $instagram;
  protected $description;
  protected $gender;
  protected $country;
  protected $badge;
  protected $jersey;
  protected $logo;
  protected $banner;
  protected $youtube;
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
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getTeamShort() {
    return $this->teamShort;
  }

  /**
   * {@inheritdoc}
   */
  public function getAlternateName() {
    return $this->alternateName;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormedYear() {
    return $this->formedYear;
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
  public function getLeague() {
    return $this->league;
  }

  /**
   * {@inheritdoc}
   */
  public function getDivision() {
    return $this->division;
  }

  /**
   * {@inheritdoc}
   */
  public function getManager() {
    return $this->manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getStadium() {
    return $this->stadium;
  }

  /**
   * {@inheritdoc}
   */
  public function getKeywords() {
    return $this->keywords;
  }

  /**
   * {@inheritdoc}
   */
  public function getRss() {
    return $this->rss;
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumThumb() {
    return $this->stadiumThumb;
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumDescription() {
    return $this->stadiumDescription;
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumLocation() {
    return $this->stadiumLocation;
  }

  /**
   * {@inheritdoc}
   */
  public function getStadiumCapacity() {
    return $this->stadiumCapacity;
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
  public function getFacebook() {
    return $this->facebook;
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
  public function getCountry() {
    return $this->country;
  }

  /**
   * {@inheritdoc}
   */
  public function getBadge() {
    return $this->badge;
  }

  /**
   * {@inheritdoc}
   */
  public function getJersey() {
    return $this->jersey;
  }

  /**
   * {@inheritdoc}
   */
  public function getLogo() {
    return $this->logo;
  }

  /**
   * {@inheritdoc}
   */
  public function getBanner() {
    return $this->banner;
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
  public function getLocked() {
    return $this->locked;
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'sport', 'strSport');
  }


  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'league', 'idLeague', array('strLeague' => 'strLeague'));
  }
}
