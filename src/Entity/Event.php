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

  /**
   * The property map definition.
   *
   * @var array
   */
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
   * The league of this event.
   *
   * @var \TheSportsDb\Entity\LeagueInterface
   */
  protected $league;

  /**
   * The filename.
   *
   * @var string
   */
  protected $filename;

  /**
   * The season.
   *
   * @var \TheSportsDb\Entity\SeasonInterface
   */
  protected $season;

  /**
   * The description.
   *
   * @var string
   */
  protected $description;

  /**
   * The home score.
   *
   * @var int
   */
  protected $homeScore;

  /**
   * The round.
   *
   * @var int
   */
  protected $round;

  /**
   * The away score.
   *
   * @var int
   */
  protected $awayScore;

  /**
   * The number of specators.
   *
   * @var int
   */
  protected $specators;

  /**
   * The home goal details.
   *
   * @var string
   */
  protected $homeGoalDetails;

  /**
   * The home red cards.
   *
   * @var string
   */
  protected $homeRedCards;

  /**
   * The home yellow cards.
   *
   * @var string
   */
  protected $homeYellowCards;

  /**
   * The home lineup - goalkeeper.
   *
   * @var string
   */
  protected $homeLineupGoalkeeper;

  /**
   * The home lineup - defense.
   *
   * @var string
   */
  protected $homeLineupDefense;

  /**
   * The home lineup - midfield.
   *
   * @var string
   */
  protected $homeLineupMidfield;

  /**
   * The home lineup - forward.
   *
   * @var string
   */
  protected $homeLineupForward;

  /**
   * The home lineup - substitutes.
   *
   * @var string
   */
  protected $homeLineupSubstitues;

  /**
   * The home formation.
   *
   * @var string
   */
  protected $homeFormation;

  /**
   * The away red cards.
   *
   * @var string
   */
  protected $awayRedCards;

  /**
   * The away yellow cards.
   *
   * @var string
   */
  protected $awayYellowCards;

  /**
   * The away goal details.
   *
   * @var string
   */
  protected $awayGoalDetails;

  /**
   * The away lineup - goalkeeper.
   *
   * @var string
   */
  protected $awayLineupGoalkeeper;

  /**
   * The away lineup - defense.
   *
   * @var string
   */
  protected $awayLineupDefense;

  /**
   * The away lineup - midfield.
   *
   * @var string
   */
  protected $awayLineupMidfield;

  /**
   * The away lineup - forward.
   *
   * @var string
   */
  protected $awayLineupForward;

  /**
   * The away lineup - substitutes.
   *
   * @var string
   */
  protected $awayLineupSubstitutes;

  /**
   * The away formation.
   *
   * @var string
   */
  protected $awayFormation;

  /**
   * The home shots.
   *
   * @var int
   */
  protected $homeShots;

  /**
   * The away shots.
   *
   * @var int
   */
  protected $awayShots;

  /**
   * The date.
   *
   * @var string
   */
  protected $date;

  /**
   * The TV station.
   *
   * @var string
   */
  protected $tvStation;
  protected $homeTeam;
  protected $awayTeam;

  /**
   * The result.
   *
   * @var string
   */
  protected $result;

  /**
   * The circuit.
   *
   * @var string
   */
  protected $circuit;

  /**
   * The country.
   *
   * @var string
   */
  protected $country;

  /**
   * The city.
   *
   * @var string
   */
  protected $city;

  /**
   * The poster URL.
   *
   * @var string
   */
  protected $poster;

  /**
   * The thumbnail URL.
   *
   * @var string
   */
  protected $thumb;

  /**
   * The banner URL.
   *
   * @var string
   */
  protected $banner;

  /**
   * The map URL.
   *
   * @var string
   */
  protected $map;

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
   * Transforms the league property to a league entity.
   *
   * @param mixed $value
   *   The source value of the league property.
   * @param \stdClass $context
   *   The source object representing this event.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league entity.
   */
  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'league', 'idLeague', array('strLeague' => 'strLeague'));
  }

  /**
   * Transforms the season property to a season entity.
   *
   * @param mixed $value
   *   The source value of the season property.
   * @param \stdClass $context
   *   The source object representing this event.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\SeasonInterface
   *   The season entity.
   */
  public static function transformSeason($value, $context, EntityManagerInterface $entityManager) {
    $season = is_object($value) ? $value : (object) array('idLeague' => $context->idLeague, 'strSeason' => $value);
    $id = $season->strSeason . '|' . $season->idLeague;
    $seasonEntity = $entityManager->repository('season')->byId($id);
    $seasonEntity->update($season);
    return $seasonEntity;
  }

  /**
   * Transforms the home team property to a team entity.
   *
   * @param mixed $value
   *   The source value of the home team property.
   * @param \stdClass $context
   *   The source object representing this event.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team entity.
   */
  public static function transformHomeTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strHomeTeam' => 'strTeam'));
  }

  /**
   * Transforms the away team property to a team entity.
   *
   * @param mixed $value
   *   The source value of the away team property.
   * @param \stdClass $context
   *   The source object representing this event.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team entity.
   */
  public static function transformAwayTeam($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'team', 'idTeam', array('strAwayTeam' => 'strTeam'));
  }
}
