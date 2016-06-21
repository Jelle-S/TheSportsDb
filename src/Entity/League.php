<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\League.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A fully loaded league object.
 *
 * @author Jelle Sebreghts
 */
class League extends Entity implements LeagueInterface {

  protected static $propertyMapDefinition = array(
    array('idLeague', 'id'),
    array('strLeague', 'name'),
    array('strSport', 'sport', array(
      array(self::class, 'transformSport'),
      array(Sport::class, 'reverse'),
    )),
    array('strLeagueAlternate', 'alternateName'),
    array('intFormedYear', 'formedYear'),
    array('dateFirstEvent', 'dateFirstEvent'), //"2013-03-02",
    array('strGender', 'gender'),
    array('strCountry', 'country'),
    array('strWebsite', 'website'),
    array('strFacebook', 'facebook'),
    array('strTwitter', 'twitter'),
    array('strYoutube', 'youtube'),
    array('strRSS', 'rss'),
    array('strDescriptionEN', 'description'),
    array('strBanner', 'banner'),
    array('strBadge', 'badge'),
    array('strLogo', 'logo'),
    array('strPoster', 'poster'),
    array('strTrophy', 'trophy'),
    array('strNaming', 'naming'),
    array('strLocked', 'locked'),
    array('seasons', 'seasons', array(
      array(self::class, 'transformSeasons'),
      array(Season::class, 'reverseArray'),
    )),
    // idSoccerXML
    // strDescriptionDE
    // strDescriptionFR
    // strDescriptionIT
    // strDescriptionCN
    // strDescriptionJP
    // strDescriptionRU
    // strDescriptionES
    // strDescriptionPT
    // strDescriptionSE
    // strDescriptionNL
    // strDescriptionHU
    // strDescriptionNO
    // strDescriptionPL
    // strFanart1
    // strFanart2
    // strFanart3
    // strFanart4
  );

  protected $id;
  protected $name;
  protected $sport;
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

  public function getSport() {
    return $this->sport;
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

  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    $id = $value;
    if (is_object($value)) {
      $id = $value->strSport;
      $sport = $value;
    }
    else {
      $sport = (object) array('strSport' => $id);
    }
    $sportEntity = $entityManager->repository('sport')->byId($id);
    // Update with given values.
    $sportEntity->update($sport);
    return $sportEntity;
  }

  public static function transformSeasons($value, $context, EntityManagerInterface $entityManager) {
    $mapped_seasons = array();
    foreach ($value as $season) {
      $id = array($season->strSeason, $season->idLeague);
      $mapped_seasons[] = $entityManager->repository('season')->byId($id);
    }
    return $mapped_seasons;
  }
}
