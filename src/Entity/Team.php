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

  /**
   * The primary identifier.
   *
   * @var mixed
   */
  protected $id;

  /**
   * The name.
   *
   * @var string
   */
  protected $name;

  /**
   * The short name.
   *
   * @var string
   */
  protected $teamShort;

  /**
   * The alternate name
   *
   * @var string
   */
  protected $alternateName;

  /**
   * The year the team was formed.
   *
   * @var int
   */
  protected $formedYear;

  /**
   * The sport of this team.
   *
   * @var \TheSportsDb\Entity\SportInterface
   */
  protected $sport;

  /**
   * The league of this team.
   *
   * @var \TheSportsDb\Entity\LeagueInterface
   */
  protected $league;

  /**
   * The division.
   *
   * @var string
   */
  protected $division;

  /**
   * The manager.
   *
   * @var string
   */
  protected $manager;

  /**
   * The stadium.
   *
   * @var string
   */
  protected $stadium;

  /**
   * The keywords.
   *
   * @var string
   */
  protected $keywords;

  /**
   * The URL of the RSS feed.
   *
   * @var string
   */
  protected $rss;

  /**
   * The URL of the stadium thumbnail.
   *
   * @var string
   */
  protected $stadiumThumb;

  /**
   * The stadium description.
   *
   * @var string
   */
  protected $stadiumDescription;

  /**
   * The stadium location.
   *
   * @var string
   */
  protected $stadiumLocation;

  /**
   * The stadium location.
   *
   * @var int
   */
  protected $stadiumCapacity;

  /**
   * The URL to the website.
   *
   * @var string
   */
  protected $website;

  /**
   * The URL to the facebook page.
   *
   * @var string
   */
  protected $facebook;

  /**
   * The URL to the twitter profile.
   *
   * @var string
   */
  protected $twitter;

  /**
   * The URL to the instagram page.
   *
   * @var string
   */
  protected $instagram;

  /**
   * The description.
   *
   * @var string
   */
  protected $description;

  /**
   * The gender.
   *
   * @var string
   */
  protected $gender;

  /**
   * The country.
   *
   * @var string
   */
  protected $country;

  /**
   * The URL to the badge.
   *
   * @var string
   */
  protected $badge;

  /**
   * The URL to the jersey.
   *
   * @var string
   */
  protected $jersey;

  /**
   * The URL to the logo.
   *
   * @var string
   */
  protected $logo;

  /**
   * The URL to the banner.
   *
   * @var string
   */
  protected $banner;

  /**
   * The URL to the youtube page.
   *
   * @var string
   */
  protected $youtube;

  /**
   * Whether or not the team is locked.
   *
   * @var string
   */
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
   * Transforms the sport property to a sport entity.
   *
   * @param mixed $value
   *   The source value of the sport property.
   * @param \stdClass $context
   *   The source object representing this team.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\SportInterface
   *   The sport entity.
   */
  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'sport', 'strSport');
  }


  /**
   * Transforms the league property to a league entity.
   *
   * @param mixed $value
   *   The source value of the league property.
   * @param \stdClass $context
   *   The source object representing this team.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league entity.
   */
  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'league', 'idLeague', array('strLeague' => 'strLeague'));
  }
}
