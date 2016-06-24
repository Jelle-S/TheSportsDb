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

  public static function transformTeam($value, $context, EntityManagerInterface $entityManager) {
    $data = static::transformHelper($value, $context, 'idTeam', array('strTeam' => 'strTeam'));
    $teamEntity = $entityManager->repository('team')->byId($data['id']);
    // Update with given values.
    $teamEntity->update($data['object']);
    return $teamEntity;
  }

  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    $data = static::transformHelper($value, $context, 'strSport');
    $sportEntity = $entityManager->repository('sport')->byId($data['id']);
    // Update with given values.
    $sportEntity->update($data['object']);
    return $sportEntity;
  }
}
