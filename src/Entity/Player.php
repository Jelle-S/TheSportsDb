<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Player.
 */

namespace TheSportsDb\Entity;

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
      array(self::class, 'reverseTeam'),
    ), 'team'),
    array('strNationality', 'nationality'),
    array('strPlayer', 'name'),
    array('strSport', 'sport', array(
      array(self::class, 'transformSport'),
      array(self::class, 'reverseSport'),
    ), 'sport'),
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

  public function getId() {
    return $this->id;
  }

  public function getTeam() {
    return $this->team;
  }

  public function getNationality() {
    return $this->nationality;
  }

  public function getName() {
    return $this->name;
  }

  public function getSport() {
    return $this->sport;
  }

  public function getBirthDay() {
    return $this->birthDay;
  }

  public function getDateSigned() {
    return $this->dateSigned;
  }

  public function getSigning() {
    return $this->signing;
  }

  public function getWage() {
    return $this->wage;
  }

  public function getBirthLocation() {
    return $this->birthLocation;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getPosition() {
    return $this->position;
  }

  public function getFacebook() {
    return $this->facebook;
  }

  public function getWebsite() {
    return $this->website;
  }

  public function getTwitter() {
    return $this->twitter;
  }

  public function getInstagram() {
    return $this->instagram;
  }

  public function getYoutube() {
    return $this->youtube;
  }

  public function getHeight() {
    return $this->height;
  }

  public function getWeight() {
    return $this->weight;
  }

  public function getThumb() {
    return $this->thumb;
  }

  public function getCutout() {
    return $this->cutout;
  }

  public function getLocked() {
    return $this->locked;
  }

  public static function transformTeam($value, $context, FactoryInterface $factory) {
    if (is_object($value)) {
      $team = $value;
    }
    else {
      $team = (object) array('idTeam' => $value);
      if (isset($context->strTeam)) {
        $team->strTeam = $context->strTeam;
      }
    }
    return $factory->create($team);
  }

  public static function reverseTeam(TeamInterface $team, $context, FactoryInterface $factory) {
    return $factory->reverseMapProperties($team->raw());
  }

  public static function transformSport($value, $context, FactoryInterface $factory) {
    if (is_object($value)) {
      $sport = $value;
    }
    else {
      $sport = (object) array('strSport' => $value);
    }
    return $factory->create($sport);
  }

  public static function reverseSport(SportInterface $sport, $context, FactoryInterface $factory) {
    return $factory->reverseMapProperties($sport->raw());
  }
}
