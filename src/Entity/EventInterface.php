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

  public function getId();

  public function getName();

  public function getLeague();

  public function getFilename();

  public function getSeason();

  public function getDescription();

  public function getHomeScore();

  public function getRound();

  public function getAwayScore();

  public function getSpecators();

  public function getHomeGoalDetails();

  public function getHomeRedCards();

  public function getHomeYellowCards();

  public function getHomeLineupGoalkeeper();

  public function getHomeLineupDefense();

  public function getHomeLineupMidfield();

  public function getHomeLineupForward();

  public function getHomeLineupSubstitues();

  public function getHomeFormation();

  public function getAwayRedCards();

  public function getAwayYellowCards();

  public function getAwayGoalDetails();

  public function getAwayLineupGoalkeeper();

  public function getAwayLineupDefense();

  public function getAwayLineupMidfield();

  public function getAwayLineupForward();

  public function getAwayLineupSubstitutes();

  public function getAwayFormation();

  public function getHomeShots();

  public function getAwayShots();

  public function getDate();

  public function getTvStation();

  public function getHomeTeam();

  public function getAwayTeam();

  public function getResult();

  public function getCircuit();

  public function getCountry();

  public function getCity();

  public function getPoster();

  public function getThumb();

  public function getBanner();

  public function getMap();

  public function getLocked();
}
