<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\League.
 */

namespace TheSportsDb\Entity;

/**
 * A fully loaded league object.
 *
 * @author Jelle Sebreghts
 */
class League extends Entity implements LeagueInterface {

  protected $id;

  protected $name;

  protected $sportName;

  protected $alternateName;

  protected $formedYear;

  protected $dateFirstEvent;

  protected $gender;

  protected $country;

  protected $website;

  protected $facebook;

  protected $twitter;

  protected $youtube;

  protected $rss;

  protected $description;

  protected $banner;

  protected $badge;

  protected $logo;

  protected $poster;

  protected $trophy;

  protected $naming;

  protected $locked;

  protected $seasons = array();

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getSportName() {
    return $this->sportName;
  }

  public function getAlternateName() {
    return $this->alternateName;
  }

  public function getFormedYear() {
    return $this->formedYear;
  }

  public function getDateFirstEvent() {
    return $this->dateFirstEvent;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getCountry() {
    return $this->country;
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

  public function getYoutube() {
    return $this->youtube;
  }

  public function getRss() {
    return $this->rss;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getBanner() {
    return $this->banner;
  }

  public function getBadge() {
    return $this->badge;
  }

  public function getLogo() {
    return $this->logo;
  }

  public function getPoster() {
    return $this->poster;
  }

  public function getTrophy() {
    return $this->trophy;
  }

  public function getNaming() {
    return $this->naming;
  }

  public function getLocked() {
    return $this->locked;
  }

  public function getSeasons() {
    return $this->seasons;
  }
}
