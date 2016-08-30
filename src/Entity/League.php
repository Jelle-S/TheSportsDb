<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\League.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\PropertyMapper\PropertyDefinition;

/**
 * A fully loaded league object.
 *
 * @author Jelle Sebreghts
 */
class League extends Entity implements LeagueInterface {

  /**
   * {@inheritdoc}
   */
  protected static $propertyMapDefinition;

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
   * The sport
   *
   * @var \TheSportsDb\Entity\SportInterface
   */
  protected $sport;

  /**
   * The alternate name.
   *
   * @var string
   */
  protected $alternateName;

  /**
   * The year the league was formed.
   *
   * @var int
   */
  protected $formedYear;

  /**
   * The date of the first event.
   *
   * @var string
   */
  protected $dateFirstEvent;

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
   * The website URL.
   *
   * @var string
   */
  protected $website;

  /**
   * The facebook URL.
   *
   * @var string
   */
  protected $facebook;

  /**
   * The twitter URL.
   *
   * @var string
   */
  protected $twitter;

  /**
   * The youtube URL.
   *
   * @var string
   */
  protected $youtube;

  /**
   * The RSS URL.
   *
   * @var string
   */
  protected $rss;

  /**
   * The description.
   *
   * @var string
   */
  protected $description;

  /**
   * The banner URL.
   *
   * @var string
   */
  protected $banner;

  /**
   * The badge URL.
   *
   * @var string
   */
  protected $badge;

  /**
   * The logo URL.
   *
   * @var string
   */
  protected $logo;

  /**
   * The poster URL.
   *
   * @var string
   */
  protected $poster;

  /**
   * The trophy URL.
   *
   * @var string
   */
  protected $trophy;

  /**
   * The event naming pattern.
   *
   * @var string
   */
  protected $naming;

  /**
   * Whether or not the league is locked.
   *
   * @var string
   */
  protected $locked;

  /**
   * The seasons.
   *
   * @var \TheSportsDb\Entity\SeasonInterface[]
   */
  protected $seasons = array();

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
  public function getSport() {
    return $this->sport;
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
  public function getDateFirstEvent() {
    return $this->dateFirstEvent;
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
  public function getYoutube() {
    return $this->youtube;
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
  public function getDescription() {
    return $this->description;
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
  public function getBadge() {
    return $this->badge;
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
  public function getPoster() {
    return $this->poster;
  }

  /**
   * {@inheritdoc}
   */
  public function getTrophy() {
    return $this->trophy;
  }

  /**
   * {@inheritdoc}
   */
  public function getNaming() {
    return $this->naming;
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->locked;
  }

  /**
   * {@inheritdoc}
   */
  public function getSeasons() {
    return $this->seasons;
  }

  /**
   * Transforms the sport property to a sport entity.
   *
   * @param mixed $value
   *   The source value of the sport property.
   * @param \stdClass $context
   *   The source object representing this league.
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
   * Transforms the seasons property to season entities.
   *
   * @param array $values
   *   The source value of the seasons property.
   * @param \stdClass $context
   *   The source object representing this league.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\SeasonInterface[]
   *   The season entities.
   */
  public static function transformSeasons($values, $context, EntityManagerInterface $entityManager) {
    $mappedSeasons = array();
    foreach ($values as $season) {
      $id = $season->strSeason . '|' . $season->idLeague;
      $mappedSeasons[] = $entityManager->repository('season')->byId($id);
    }
    return $mappedSeasons;
  }

  /**
   * {@inheritdoc}
   */
  protected static function initPropertyMapDefinition() {
    static::$propertyMapDefinition
      ->addPropertyMap(
        new PropertyDefinition('idLeague'),
        new PropertyDefinition('id')
      )
      ->addPropertyMap(
        new PropertyDefinition('strLeague'),
        new PropertyDefinition('name')
      )
      ->addPropertyMap(
        new PropertyDefinition('strSport'),
        new PropertyDefinition('sport', 'sport'),
        [self::class, 'transformSport'],
        [Sport::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('strLeagueAlternate'),
        new  PropertyDefinition('alternateName')
      )
      ->addPropertyMap(
        new PropertyDefinition('intFormedYear'),
        new  PropertyDefinition('formedYear')
      )
      ->addPropertyMap(
        new PropertyDefinition('dateFirstEvent'),
        new  PropertyDefinition('dateFirstEvent')) //"2013-03-02",
      ->addPropertyMap(
        new PropertyDefinition('strGender'),
        new  PropertyDefinition('gender')
      )
      ->addPropertyMap(
        new PropertyDefinition('strCountry'),
        new  PropertyDefinition('country')
      )
      ->addPropertyMap(
        new PropertyDefinition('strWebsite'),
        new  PropertyDefinition('website')
      )
      ->addPropertyMap(
        new PropertyDefinition('strFacebook'),
        new  PropertyDefinition('facebook')
      )
      ->addPropertyMap(
        new PropertyDefinition('strTwitter'),
        new  PropertyDefinition('twitter')
      )
      ->addPropertyMap(
        new PropertyDefinition('strYoutube'),
        new  PropertyDefinition('youtube')
      )
      ->addPropertyMap(
        new PropertyDefinition('strRSS'),
        new  PropertyDefinition('rss')
      )
      ->addPropertyMap(
        new PropertyDefinition('strDescriptionEN'),
        new  PropertyDefinition('description')
      )
      ->addPropertyMap(
        new PropertyDefinition('strBanner'),
        new  PropertyDefinition('banner')
      )
      ->addPropertyMap(
        new PropertyDefinition('strBadge'),
        new  PropertyDefinition('badge')
      )
      ->addPropertyMap(
        new PropertyDefinition('strLogo'),
        new  PropertyDefinition('logo')
      )
      ->addPropertyMap(
        new PropertyDefinition('strPoster'),
        new  PropertyDefinition('poster')
      )
      ->addPropertyMap(
        new PropertyDefinition('strTrophy'),
        new  PropertyDefinition('trophy')
      )
      ->addPropertyMap(
        new PropertyDefinition('strNaming'),
        new  PropertyDefinition('naming')
      )
      ->addPropertyMap(
        new PropertyDefinition('strLocked'),
        new  PropertyDefinition('locked')
      )
      ->addPropertyMap(
        new PropertyDefinition('seasons'),
        new  PropertyDefinition('seasons', 'season', TRUE),
        [self::class, 'transformSeasons'],
        [Season::class, 'reverseArray']
      );
    // idSoccerXML
    // strDescriptionDE
    // strDescriptionFR
    // strDescriptionIT
    // strDescriptionCN
    // strDescriptionJP
    // strDescriptionRU
    // strDescriptionES
    // strDescriptionPT
    // strDescriptionSE
    // strDescriptionNL
    // strDescriptionHU
    // strDescriptionNO
    // strDescriptionPL
    // strFanart1
    // strFanart2
    // strFanart3
    // strFanart4
  }

}
