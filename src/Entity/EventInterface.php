<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EventInterface.
 */

namespace TheSportsDb\Entity;

/**
 * Interface for events.
 *
 * @author Jelle Sebreghts
 */
interface EventInterface extends EntityInterface {

  /**
   * Gets the primary identifier.
   *
   * @return mixed
   *   The primary identifier.
   */
  public function getId();

  /**
   * Gets the name.
   *
   * @return string
   *   The name.
   */
  public function getName();

  /**
   * Gets the league.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league.
   */
  public function getLeague();

  /**
   * Gets the filename.
   *
   * @return string
   *   The filename.
   */
  public function getFilename();

  /**
   * Gets the season.
   *
   * @return \TheSportsDb\Entity\SeasonInterface
   *   The season.
   */
  public function getSeason();

  /**
   * Gets the description.
   *
   * @return string
   *   The description.
   */
  public function getDescription();

  /**
   * Gets the home score.
   *
   * @return int
   *   The home score.
   */
  public function getHomeScore();

  /**
   * Gets the round.
   *
   * @return int
   *   The round.
   */
  public function getRound();

  /**
   * Gets the away score.
   *
   * @return int
   *   The away score.
   */
  public function getAwayScore();

  /**
   * Gets the number of specators.
   *
   * @return int
   *   The number of spectators.
   */
  public function getSpecators();

  /**
   * Gets the home goal details.
   *
   * @return string
   *   The home goal details.
   */
  public function getHomeGoalDetails();

  /**
   * Gets the home red cards.
   *
   * @return string
   *   The home red cards.
   */
  public function getHomeRedCards();

  /**
   * Gets the home yellow cards.
   *
   * @return string
   *   The home yellow cards.
   */
  public function getHomeYellowCards();

  /**
   * Gets the home lineup - goalkeeper.
   *
   * @return string
   *   The home lineup - goalkeeper.
   */
  public function getHomeLineupGoalkeeper();

  /**
   * Gets the home lineup - defense.
   *
   * @return string
   *   The home lineup - defense.
   */
  public function getHomeLineupDefense();

  /**
   * Gets the home lineup - midfield.
   *
   * @return string
   *   The home lineup - midfield.
   */
  public function getHomeLineupMidfield();

  /**
   * Gets the home lineup - forward.
   *
   * @return string
   *   The home lineup - forward.
   */
  public function getHomeLineupForward();

  /**
   * Gets the home lineup - substitutes.
   *
   * @return string
   *   The home lineup - substitutes.
   */
  public function getHomeLineupSubstitues();

  /**
   * Gets the home formation.
   *
   * @return string
   *   The home formation.
   */
  public function getHomeFormation();

  /**
   * Gets the away red cards.
   *
   * @return string
   *   The away red cards.
   */
  public function getAwayRedCards();

  /**
   * Gets the away yellow cards.
   *
   * @return string
   *   The away yellow cards.
   */
  public function getAwayYellowCards();

  /**
   * Gets the away goal details.
   *
   * @return string
   *   The away goal details.
   */
  public function getAwayGoalDetails();

  /**
   * Gets the away lineup - goalkeeper.
   *
   * @return string
   *   The away lineup - goalkeeper.
   */
  public function getAwayLineupGoalkeeper();

  /**
   * Gets the away lineup - defense.
   *
   * @return string
   *   The away lineup - defense.
   */
  public function getAwayLineupDefense();

  /**
   * Gets the away lineup - midfield.
   *
   * @return string
   *   The away lineup - midfield.
   */
  public function getAwayLineupMidfield();

  /**
   * Gets the away lineup - forward.
   *
   * @return string
   *   The away lineup - forward.
   */
  public function getAwayLineupForward();

  /**
   * Gets the away lineup - substitutes.
   *
   * @return string
   *   The away lineup - substitutes.
   */
  public function getAwayLineupSubstitutes();

  /**
   * Gets the away formation.
   *
   * @return string
   *   The away formation.
   */
  public function getAwayFormation();

  /**
   * Gets the home shots.
   *
   * @return int
   *   The home shots.
   */
  public function getHomeShots();

  /**
   * Gets the away shots.
   *
   * @return int
   *   The away shots.
   */
  public function getAwayShots();

  /**
   * Gets the date.
   *
   * @return string
   *   The date.
   */
  public function getDate();

  /**
   * Gets the TV station.
   *
   * @return string
   *   The TV station.
   */
  public function getTvStation();

  /**
   * Gets the home team.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The home team.
   */
  public function getHomeTeam();

  /**
   * Gets the away team.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The away team.
   */
  public function getAwayTeam();

  /**
   * Gets the result.
   *
   * @return string
   *   The result.
   */
  public function getResult();

  /**
   * Gets the circuit.
   *
   * @return string
   *   The circuit.
   */
  public function getCircuit();

  /**
   * Gets the country.
   *
   * @return string
   *   The country.
   */
  public function getCountry();

  /**
   * Gets the city.
   *
   * @return string
   *   The city.
   */
  public function getCity();

  /**
   * Gets the poster URL.
   *
   * @return string
   *   The poster URL.
   */
  public function getPoster();

  /**
   * Gets the thumbnail URL.
   *
   * @return string
   *   The thumbnail URL.
   */
  public function getThumb();

  /**
   * Gets the banner URL.
   *
   * @return string
   *   The banner URL.
   */
  public function getBanner();

  /**
   * Gets the map URL.
   *
   * @return string
   *   The map URL.
   */
  public function getMap();

  /**
   * Whether this team is locked or not.
   *
   * @return string
   *   Returns 'locked' or 'unlocked'.
   */
  public function getLocked();
}
