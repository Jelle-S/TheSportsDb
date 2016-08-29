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

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getSport() {
    return $this->sport;
  }

  /**
   * {@inheritdoc}
   */
  public function getAlternateName() {
    return $this->alternateName;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormedYear() {
    return $this->formedYear;
  }

  /**
   * {@inheritdoc}
   */
  public function getDateFirstEvent() {
    return $this->dateFirstEvent;
  }

  /**
   * {@inheritdoc}
   */
  public function getGender() {
    return $this->gender;
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
  public function getWebsite() {
    return $this->website;
  }

  /**
   * {@inheritdoc}
   */
  public function getFacebook() {
    return $this->facebook;
  }

  /**
   * {@inheritdoc}
   */
  public function getTwitter() {
    return $this->twitter;
  }

  /**
   * {@inheritdoc}
   */
  public function getYoutube() {
    return $this->youtube;
  }

  /**
   * {@inheritdoc}
   */
  public function getRss() {
    return $this->rss;
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
  public function getBanner() {
    return $this->banner;
  }

  /**
   * {@inheritdoc}
   */
  public function getBadge() {
    return $this->badge;
  }

  /**
   * {@inheritdoc}
   */
  public function getLogo() {
    return $this->logo;
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
  public function getTrophy() {
    return $this->trophy;
  }

  /**
   * {@inheritdoc}
   */
  public function getNaming() {
    return $this->naming;
  }

  /**
   * {@inheritdoc}
   */
  public function getLocked() {
    return $this->locked;
  }

  /**
   * {@inheritdoc}
   */
  public function getSeasons() {
    return $this->seasons;
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformSport($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'sport', 'strSport');
  }

  /**
   *
   * @param type $value
   * @param type $context
   * @param EntityManagerInterface $entityManager
   * @return type
   */
  public static function transformSeasons($value, $context, EntityManagerInterface $entityManager) {
    $mappedSeasons = array();
    foreach ($value as $season) {
      $id = $season->strSeason . '|' . $season->idLeague;
      $mappedSeasons[] = $entityManager->repository('season')->byId($id);
    }
    return $mappedSeasons;
  }
}
