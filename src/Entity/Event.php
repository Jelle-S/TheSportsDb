<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Event.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\PropertyMapper\PropertyDefinition;

/**
 * A fully loaded event object.
 *
 * @author Jelle Sebreghts
 */
class Event extends Entity implements EventInterface {

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

  /**
   * The home team.
   *
   * @var \TheSportsDb\Entity\TeamInterface
   */
  protected $homeTeam;

  /**
   * The away team.
   *
   * @var \TheSportsDb\Entity\TeamInterface
   */
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

  /**
   * {@inhertidoc}
   */
  protected static function initPropertyMapDefinition() {
    static::$propertyMapDefinition
      ->addPropertyMap(
        new PropertyDefinition('idEvent'),
        new PropertyDefinition('id')
      )
      ->addPropertyMap(
        new PropertyDefinition('strEvent'),
        new PropertyDefinition('name')
      )
      ->addPropertyMap(
        new PropertyDefinition('strFilename'),
        new PropertyDefinition('filename')
      )
      ->addPropertyMap(
        new PropertyDefinition('idLeague'),
        new PropertyDefinition('league', 'league'),
        [static::class, 'transformLeague'],
        [League::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('strSeason'),
        new PropertyDefinition('season', 'season'),
        [static::class, 'transformSeason'],
        [Season::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('strDescriptionEN'),
        new PropertyDefinition('description')
      )
      ->addPropertyMap(
        new PropertyDefinition('intHomeScore'),
        new PropertyDefinition('homeScore')
      )
      ->addPropertyMap(
        new PropertyDefinition('intRound'),
        new PropertyDefinition('round')
      )
      ->addPropertyMap(
        new PropertyDefinition('intAwayScore'),
        new PropertyDefinition('awayScore')
      )
      ->addPropertyMap(
        new PropertyDefinition('intSpectators'),
        new PropertyDefinition('spectators')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeGoalDetails'),
        new PropertyDefinition('homeGoalDetails')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeRedCards'),
        new PropertyDefinition('homeRedCards')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeYellowCards'),
        new PropertyDefinition('homeYellowCards')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupGoalkeeper'),
        new PropertyDefinition('homeLineupGoalkeeper')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupDefense'),
        new PropertyDefinition('homeLineupDefense')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupMidfield'),
        new PropertyDefinition('homeLineupMidfield')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupForward'),
        new PropertyDefinition('homeLineupForward')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupSubstitutes'),
        new PropertyDefinition('homeLineupSubstitutes')
      )
      ->addPropertyMap(
        new PropertyDefinition('strHomeLineupFormation'),
        new PropertyDefinition('homeLineupFormation')
      )
      ->addPropertyMap(
        new PropertyDefinition('intHomeShots'),
        new PropertyDefinition('homeShots')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayGoalDetails'),
        new PropertyDefinition('awayGoalDetails')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayRedCards'),
        new PropertyDefinition('awayRedCards')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayYellowCards'),
        new PropertyDefinition('awayYellowCards')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupGoalkeeper'),
        new PropertyDefinition('awayLineupGoalkeeper')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupDefense'),
        new PropertyDefinition('awayLineupDefense')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupMidfield'),
        new PropertyDefinition('awayLineupMidfield')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupForward'),
        new PropertyDefinition('awayLineupForward')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupSubstitutes'),
        new PropertyDefinition('awayLineupSubstitutes')
      )
      ->addPropertyMap(
        new PropertyDefinition('strAwayLineupFormation'),
        new PropertyDefinition('awayLineupFormation')
      )
      ->addPropertyMap(
        new PropertyDefinition('intAwayShots'),
        new PropertyDefinition('awayShots')
      )
      ->addPropertyMap(
        new PropertyDefinition('dateEvent'),
        new PropertyDefinition('date')
      )/* todo: map dateEvent and strTime to date*/
      ->addPropertyMap(
        new PropertyDefinition('strTVStation'),
        new PropertyDefinition('tvStation')
      )
      ->addPropertyMap(
        new PropertyDefinition('idHomeTeam'),
        new PropertyDefinition('homeTeam', 'team'),
        [static::class, 'transformHomeTeam'],
        [Team::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('idAwayTeam'),
        new PropertyDefinition('awayTeam', 'team'),
        [self::class, 'transformAwayTeam'],
        [Team::class, 'reverse']
      )
      ->addPropertyMap(
        new PropertyDefinition('strResult'),
        new PropertyDefinition('result')
      )
      ->addPropertyMap(
        new PropertyDefinition('strCircuit'),
        new PropertyDefinition('circuit')
      )
      ->addPropertyMap(
        new PropertyDefinition('strCountry'),
        new PropertyDefinition('country')
      )
      ->addPropertyMap(
        new PropertyDefinition('strCity'),
        new PropertyDefinition('city')
      )
      ->addPropertyMap(
        new PropertyDefinition('strPoster'),
        new PropertyDefinition('poster')
      )
      ->addPropertyMap(
        new PropertyDefinition('strThumb'),
        new PropertyDefinition('thumb')
      )
      ->addPropertyMap(
        new PropertyDefinition('strBanner'),
        new PropertyDefinition('banner')
      )
      ->addPropertyMap(
        new PropertyDefinition('strMap'),
        new PropertyDefinition('map')
      )
      ->addPropertyMap(
        new PropertyDefinition('strLocked'),
        new PropertyDefinition('locked')
      );
      // idSoccerXML
      // strLeague
      // strHomeTeam
      // strAwayTeam
      // strFanart
      // strTime
  }

}
