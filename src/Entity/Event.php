<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Event.
 */

namespace TheSportsDb\Entity;

/**
 * A fully loaded event object.
 *
 * @author Jelle Sebreghts
 */
class Event extends Entity implements EventInterface {

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
  protected $time;
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

  public function getName() {
    return $this->name;
  }

  public function getLeague() {
    return $this->league;
  }

  public function getFilename() {
    return $this->filename;
  }

  public function getSeason() {
    return $this->season;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getHomeScore() {
    return $this->homeScore;
  }

  public function getRound() {
    return $this->round;
  }

  public function getAwayScore() {
    return $this->awayScore;
  }

  public function getSpecators() {
    return $this->specators;
  }

  public function getHomeGoalDetails() {
    return $this->homeGoalDetails;
  }

  public function getHomeRedCards() {
    return $this->homeRedCards;
  }

  public function getHomeYellowCards() {
    return $this->homeYellowCards;
  }

  public function getHomeLineupGoalkeeper() {
    return $this->homeLineupGoalkeeper;
  }

  public function getHomeLineupDefense() {
    return $this->homeLineupDefense;
  }

  public function getHomeLineupMidfield() {
    return $this->homeLineupMidfield;
  }

  public function getHomeLineupForward() {
    return $this->homeLineupForward;
  }

  public function getHomeLineupSubstitues() {
    return $this->homeLineupSubstitues;
  }

  public function getHomeFormation() {
    return $this->homeFormation;
  }

  public function getAwayRedCards() {
    return $this->awayRedCards;
  }

  public function getAwayYellowCards() {
    return $this->awayYellowCards;
  }

  public function getAwayGoalDetails() {
    return $this->awayGoalDetails;
  }

  public function getAwayLineupGoalkeeper() {
    return $this->awayLineupGoalkeeper;
  }

  public function getAwayLineupDefense() {
    return $this->awayLineupDefense;
  }

  public function getAwayLineupMidfield() {
    return $this->awayLineupMidfield;
  }

  public function getAwayLineupForward() {
    return $this->awayLineupForward;
  }

  public function getAwayLineupSubstitutes() {
    return $this->awayLineupSubstitutes;
  }

  public function getAwayFormation() {
    return $this->awayFormation;
  }

  public function getHomeShots() {
    return $this->homeShots;
  }

  public function getAwayShots() {
    return $this->awayShots;
  }

  public function getDate() {
    return $this->date;
  }

  public function getTime() {
    return $this->time;
  }

  public function getTvStation() {
    return $this->tvStation;
  }

  public function getHomeTeam() {
    return $this->homeTeam;
  }

  public function getAwayTeam() {
    return $this->awayTeam;
  }

  public function getResult() {
    return $this->result;
  }

  public function getCircuit() {
    return $this->circuit;
  }

  public function getCountry() {
    return $this->country;
  }

  public function getCity() {
    return $this->city;
  }

  public function getPoster() {
    return $this->poster;
  }

  public function getThumb() {
    return $this->thumb;
  }

  public function getBanner() {
    return $this->banner;
  }

  public function getMap() {
    return $this->map;
  }

  public function getLocked() {
    return $this->locked;
  }

}
