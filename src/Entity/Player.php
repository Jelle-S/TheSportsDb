<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Player.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\PropertyMapper\PropertyDefinition;

/**
 * A fully loaded player object.
 *
 * @author Jelle Sebreghts
 */
class Player extends Entity implements PlayerInterface {

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
   * The team.
   *
   * @var \TheSportsDb\Entity\TeamInterface
   */
  protected $team;

  /**
   * The nationality.
   *
   * @var string
   */
  protected $nationality;

  /**
   * The name.
   *
   * @var string
   */
  protected $name;

  /**
   * The sport.
   *
   * @var \TheSportsDb\Entity\SportInterface
   */
  protected $sport;

  /**
   * The birthday.
   *
   * @var string
   */
  protected $birthDay;

  /**
   * The date this player signed.
   *
   * @var string
   */
  protected $dateSigned;

  /**
   * The amount this player signed for.
   *
   * @var string
   */
  protected $signing;

  /**
   * The wage.
   *
   * @var string
   */
  protected $wage;

  /**
   * The birth location.
   *
   * @var string
   */
  protected $birthLocation;

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
   * The position.
   *
   * @var string
   */
  protected $position;

  /**
   * The facebook URL.
   *
   * @var string
   */
  protected $facebook;

  /**
   * The website URL.
   *
   * @var string
   */
  protected $website;

  /**
   * The twitter profile URL.
   *
   * @var string
   */
  protected $twitter;

  /**
   * The instagram URL.
   *
   * @var string
   */
  protected $instagram;

  /**
   * The youtube URL.
   *
   * @var string
   */
  protected $youtube;

  /**
   * The height.
   *
   * @var float
   */
  protected $height;

  /**
   * The weight.
   *
   * @var float
   */
  protected $weight;

  /**
   * The thumbnail URL.
   *
   * @var string
   */
  protected $thumb;

  /**
   * The cutout URL.
   *
   * @var string
   */
  protected $cutout;

  /**
   * Whether this player is locked or not.
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

  /**
   * Transforms the team property to a team entity.
   *
   * @param mixed $value
   *   The source value of the team property.
   * @param \stdClass $context
   *   The source object representing this player.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team entity.
   */
  public static function transformTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strTeam' => 'strTeam'));
  }

  /**
   * Transforms the sport property to a sport entity.
   *
   * @param mixed $value
   *   The source value of the sport property.
   * @param \stdClass $context
   *   The source object representing this player.
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
   * {@inheritdoc}
   */
  protected static function initPropertyMapDefinition() {
    static::$propertyMapDefinition
      ->addPropertyMap(
        new PropertyDefinition('idPlayer'),
        new PropertyDefinition('id')
      )
      ->addPropertyMap(
        new PropertyDefinition('idTeam'),
        new PropertyDefinition('team'),
        [self::class, 'transformTeam'],
        [Team::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('strNationality'),
        new PropertyDefinition('nationality')
      )
      ->addPropertyMap(
        new PropertyDefinition('strPlayer'),
        new PropertyDefinition('name')
      )
      ->addPropertyMap(
        new PropertyDefinition('strSport'),
        new PropertyDefinition('sport', 'sport'),
        [self::class, 'transformSport'],
        [Sport::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('dateBorn'),
        new PropertyDefinition('birthDay'),
        [self::class, 'transformDateDefault'],
        [self::class, 'reverseDateDefault']
      )
      ->addPropertyMap(
        new PropertyDefinition('dateSigned'),
        new PropertyDefinition('dateSigned'),
        [self::class, 'transformDateDefault'],
        [self::class, 'reverseDateDefault']
      )
      ->addPropertyMap(
        new PropertyDefinition('strSigning'),
        new PropertyDefinition('signing')
      )
      ->addPropertyMap(
        new PropertyDefinition('strWage'),
        new PropertyDefinition('wage')
      )
      ->addPropertyMap(
        new PropertyDefinition('strBirthLocation'),
        new PropertyDefinition('birthLocation')
      )
      ->addPropertyMap(
        new PropertyDefinition('strDescriptionEN'),
        new PropertyDefinition('description')
      )
      ->addPropertyMap(
        new PropertyDefinition('strGender'),
        new PropertyDefinition('gender')
      )
      ->addPropertyMap(
        new PropertyDefinition('strPosition'),
        new PropertyDefinition('position')
      )
      ->addPropertyMap(
        new PropertyDefinition('strFacebook'),
        new PropertyDefinition('facebook')
      )
      ->addPropertyMap(
        new PropertyDefinition('strWebsite'),
        new PropertyDefinition('website')
      )
      ->addPropertyMap(
        new PropertyDefinition('strTwitter'),
        new PropertyDefinition('strTwitter')
      )
      ->addPropertyMap(
        new PropertyDefinition('strInstagram'),
        new PropertyDefinition('instagram')
      )
      ->addPropertyMap(
        new PropertyDefinition('strYoutube'),
        new PropertyDefinition('youtube')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHeight'),
        new PropertyDefinition('height')
      )
      ->addPropertyMap(
        new PropertyDefinition('strWeight'),
        new PropertyDefinition('weight')
      )
      ->addPropertyMap(
        new PropertyDefinition('strThumb'),
        new PropertyDefinition('thumb')
      )
      ->addPropertyMap(
        new PropertyDefinition('strCutout'),
        new PropertyDefinition('strCutout')
      )
      ->addPropertyMap(
        new PropertyDefinition('strLocked'),
        new PropertyDefinition('locked')
      );
      // idSoccerXML
      // idPlayerManager
      // intSoccerXMLTeamID
      // strCollege
      // intLoved
      // strFanart1
      // strFanart2
      // strFanart3
      // strFanart4
  }

}
