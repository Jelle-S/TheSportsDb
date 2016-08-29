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
   * getId
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getId();

  /**
   * getName
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getName();

  /**
   * getLeague
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLeague();

  /**
   * getFilename
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getFilename();

  /**
   * getSeason
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSeason();

  /**
   * getDescription
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getDescription();

  /**
   * getHomeScore
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeScore();

  /**
   * getRound
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getRound();

  /**
   * getAwayScore
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayScore();

  /**
   * getSpecators
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSpecators();

  /**
   * getHomeGoalDetails
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeGoalDetails();

  /**
   * getHomeRedCards
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeRedCards();

  /**
   * getHomeYellowCards
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeYellowCards();

  /**
   * getHomeLineupGoalkeeper
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeLineupGoalkeeper();

  /**
   * getHomeLineupDefense
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeLineupDefense();

  /**
   * getHomeLineupMidfield
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeLineupMidfield();

  /**
   * getHomeLineupForward
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeLineupForward();

  /**
   * getHomeLineupSubstitues
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeLineupSubstitues();

  /**
   * getHomeFormation
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeFormation();

  /**
   * getAwayRedCards
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayRedCards();

  /**
   * getAwayYellowCards
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayYellowCards();

  /**
   * getAwayGoalDetails
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayGoalDetails();

  /**
   * getAwayLineupGoalkeeper
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayLineupGoalkeeper();

  /**
   * getAwayLineupDefense
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayLineupDefense();

  /**
   * getAwayLineupMidfield
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayLineupMidfield();

  /**
   * getAwayLineupForward
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayLineupForward();

  /**
   * getAwayLineupSubstitutes
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayLineupSubstitutes();

  /**
   * getAwayFormation
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayFormation();

  /**
   * getHomeShots
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeShots();

  /**
   * getAwayShots
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayShots();

  /**
   * getDate
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getDate();

  /**
   * getTvStation
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTvStation();

  /**
   * getHomeTeam
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getHomeTeam();

  /**
   * getAwayTeam
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAwayTeam();

  /**
   * getResult
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getResult();

  /**
   * getCircuit
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getCircuit();

  /**
   * getCountry
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getCountry();

  /**
   * getCity
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getCity();

  /**
   * getPoster
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPoster();

  /**
   * getThumb
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getThumb();

  /**
   * getBanner
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getBanner();

  /**
   * getMap
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getMap();

  /**
   * getLocked
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLocked();
}
