<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Event.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A fully loaded event object.
 *
 * @author Jelle Sebreghts
 */
class Event extends Entity implements EventInterface {

  protected static $propertyMapDefinition = array(
    array('idEvent', 'id'),
    array('strEvent', 'name'),
    array('strFilename', 'filename'),
    array('idLeague', 'league', array(
      array(self::class, 'transformLeague'),
      array(League::class, 'reverse'),
    )),
    array('strSeason', 'season', array(
      array(self::class, 'transformSeason'),
      array(Season::class, 'reverse'),
    )),
    array('strDescriptionEN', 'description'),
    array('intHomeScore', 'homeScore'),
    array('intRound', 'round'),
    array('intAwayScore', 'awayScore'),
    array('intSpectators', 'spectators'),
    array('strHomeGoalDetails', 'homeGoalDetails'),
    array('strHomeRedCards', 'homeRedCards'),
    array('strHomeYellowCards', 'homeYellowCards'),
    array('strHomeLineupGoalkeeper', 'homeLineupGoalkeeper'),
    array('strHomeLineupDefense', 'homeLineupDefense'),
    array('strHomeLineupMidfield', 'homeLineupMidfield'),
    array('strHomeLineupForward', 'homeLineupForward'),
    array('strHomeLineupSubstitutes', 'homeLineupSubstitutes'),
    array('strHomeLineupFormation', 'homeLineupFormation'),
    array('intHomeShots', 'homeShots'),
    array('strAwayGoalDetails', 'awayGoalDetails'),
    array('strAwayRedCards', 'awayRedCards'),
    array('strAwayYellowCards', 'awayYellowCards'),
    array('strAwayLineupGoalkeeper', 'awayLineupGoalkeeper'),
    array('strAwayLineupDefense', 'awayLineupDefense'),
    array('strAwayLineupMidfield', 'awayLineupMidfield'),
    array('strAwayLineupForward', 'awayLineupForward'),
    array('strAwayLineupSubstitutes', 'awayLineupSubstitutes'),
    array('strAwayLineupFormation', 'awayLineupFormation'),
    array('intAwayShots', 'awayShots'),
    array('dateEvent', 'date'/*, map dateEvent and strTime to date*/),
    array('strTVStation', 'tvStation'),
    array('idHomeTeam', 'homeTeam', array(
      array(self::class, 'transformHomeTeam'),
      array(Team::class, 'reverse'),
    )),
    array('idAwayTeam', 'awayTeam', array(
      array(self::class, 'transformAwayTeam'),
      array(Team::class, 'reverse'),
    )),
    array('strResult', 'result'),
    array('strCircuit', 'circuit'),
    array('strCountry', 'country'),
    array('strCity', 'city'),
    array('strPoster', 'poster'),
    array('strThumb', 'thumb'),
    array('strBanner', 'banner'),
    array('strMap', 'map'),
    array('strLocked', 'locked'),
    // idSoccerXML
    // strLeague
    // strHomeTeam
    // strAwayTeam
    // strFanart
    // strTime
  );

  protected $id;
  protected $name;
  /**
   * The league of this event.
   *
   * @var \TheSportsDb\Entity\LeagueInterface
   */
  protected $league;
  protected $filename;
  protected $season;
  protected $description;
  protected $homeScore;
  protected $round;
  protected $awayScore;
  protected $specators;
  protected $homeGoalDetails;
  protected $homeRedCards;
  protected $homeYellowCards;
  protected $homeLineupGoalkeeper;
  protected $homeLineupDefense;
  protected $homeLineupMidfield;
  protected $homeLineupForward;
  protected $homeLineupSubstitues;
  protected $homeFormation;
  protected $awayRedCards;
  protected $awayYellowCards;
  protected $awayGoalDetails;
  protected $awayLineupGoalkeeper;
  protected $awayLineupDefense;
  protected $awayLineupMidfield;
  protected $awayLineupForward;
  protected $awayLineupSubstitutes;
  protected $awayFormation;
  protected $homeShots;
  protected $awayShots;
  protected $date;
  protected $tvStation;
  protected $homeTeam;
  protected $awayTeam;
  protected $result;
  protected $circuit;
  protected $country;
  protected $city;
  protected $poster;
  protected $thumb;
  protected $banner;
  protected $map;
  protected $locked;

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
  public function getLeague() {
    return $this->league;
  }

  /**
   * {@inheritdoc}
   */
  public function getFilename() {
    return $this->filename;
  }

  /**
   * {@inheritdoc}
   */
  public function getSeason() {
    return $this->season;
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
  public function getHomeScore() {
    return $this->homeScore;
  }

  /**
   * {@inheritdoc}
   */
  public function getRound() {
    return $this->round;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayScore() {
    return $this->awayScore;
  }

  /**
   * {@inheritdoc}
   */
  public function getSpecators() {
    return $this->specators;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeGoalDetails() {
    return $this->homeGoalDetails;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeRedCards() {
    return $this->homeRedCards;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeYellowCards() {
    return $this->homeYellowCards;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupGoalkeeper() {
    return $this->homeLineupGoalkeeper;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupDefense() {
    return $this->homeLineupDefense;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupMidfield() {
    return $this->homeLineupMidfield;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupForward() {
    return $this->homeLineupForward;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeLineupSubstitues() {
    return $this->homeLineupSubstitues;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeFormation() {
    return $this->homeFormation;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayRedCards() {
    return $this->awayRedCards;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayYellowCards() {
    return $this->awayYellowCards;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayGoalDetails() {
    return $this->awayGoalDetails;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupGoalkeeper() {
    return $this->awayLineupGoalkeeper;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupDefense() {
    return $this->awayLineupDefense;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupMidfield() {
    return $this->awayLineupMidfield;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupForward() {
    return $this->awayLineupForward;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayLineupSubstitutes() {
    return $this->awayLineupSubstitutes;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayFormation() {
    return $this->awayFormation;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeShots() {
    return $this->homeShots;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayShots() {
    return $this->awayShots;
  }

  /**
   * {@inheritdoc}
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * {@inheritdoc}
   */
  public function getTvStation() {
    return $this->tvStation;
  }

  /**
   * {@inheritdoc}
   */
  public function getHomeTeam() {
    return $this->homeTeam;
  }

  /**
   * {@inheritdoc}
   */
  public function getAwayTeam() {
    return $this->awayTeam;
  }

  /**
   * {@inheritdoc}
   */
  public function getResult() {
    return $this->result;
  }

  /**
   * {@inheritdoc}
   */
  public function getCircuit() {
    return $this->circuit;
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
  public function getCity() {
    return $this->city;
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
  public function getThumb() {
    return $this->thumb;
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
  public function getMap() {
    return $this->map;
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
  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'league', 'idLeague', array('strLeague' => 'strLeague'));
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformSeason($value, $context, EntityManagerInterface $entityManager) {
    $season = is_object($value) ? $value : (object) array('idLeague' => $context->idLeague, 'strSeason' => $value);
    $id = $season->strSeason . '|' . $season->idLeague;
    $seasonEntity = $entityManager->repository('season')->byId($id);
    $seasonEntity->update($season);
    return $seasonEntity;
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformHomeTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strHomeTeam' => 'strTeam'));
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformAwayTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strAwayTeam' => 'strTeam'));
  }
}
