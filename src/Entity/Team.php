<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Team.
 */

namespace TheSportsDb\Entity;

/**
 * A fully loaded team object.
 *
 * @author Jelle Sebreghts
 */
class Team extends Entity implements TeamInterface {

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

  public function getTeamName() {
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
}
