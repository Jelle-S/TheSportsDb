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

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getTeamShort() {
    return $this->teamShort;
  }

  public function getAlternateName() {
    return $this->alternateName;
  }

  public function getFormedYear() {
    return $this->formedYear;
  }

  public function getSport() {
    return $this->sport;
  }

  public function getLeague() {
    return $this->league;
  }

  public function getDivision() {
    return $this->division;
  }

  public function getManager() {
    return $this->manager;
  }

  public function getStadium() {
    return $this->stadium;
  }

  public function getKeywords() {
    return $this->keywords;
  }

  public function getRss() {
    return $this->rss;
  }

  public function getStadiumThumb() {
    return $this->stadiumThumb;
  }

  public function getStadiumDescription() {
    return $this->stadiumDescription;
  }

  public function getStadiumLocation() {
    return $this->stadiumLocation;
  }

  public function getStadiumCapacity() {
    return $this->stadiumCapacity;
  }

  public function getWebsite() {
    return $this->website;
  }

  public function getFacebook() {
    return $this->facebook;
  }

  public function getTwitter() {
    return $this->twitter;
  }

  public function getInstagram() {
    return $this->instagram;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getCountry() {
    return $this->country;
  }

  public function getBadge() {
    return $this->badge;
  }

  public function getJersey() {
    return $this->jersey;
  }

  public function getLogo() {
    return $this->logo;
  }

  public function getBanner() {
    return $this->banner;
  }

  public function getYoutube() {
    return $this->youtube;
  }

  public function getLocked() {
    return $this->locked;
  }

  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    $data = static::transformHelper($value, $context, 'strSport');
    $sportEntity = $entityManager->repository('sport')->byId($data['id']);
    // Update with given values.
    $sportEntity->update($data['object']);
    return $sportEntity;
  }

  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    $data = static::transformHelper($value, $context, 'idLeague', array('strLeague' => 'strLeague'));
    $leagueEntity = $entityManager->repository('league')->byId($data['id']);
    // Update with given values.
    $leagueEntity->update($data['object']);
    return $leagueEntity;
  }
}
