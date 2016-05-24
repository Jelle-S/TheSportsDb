<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\LeagueInterface.
 */

namespace TheSportsDb\Entity;

/**
 * Interface for leagues.
 *
 * @author Jelle Sebreghts
 */
interface LeagueInterface extends EntityInterface {

  public function getId();

  public function getName();

  public function getSportName();

  public function getAlternateName();

  public function getFormedYear();

  public function getDateFirstEvent();

  public function getGender();

  public function getCountry();

  public function getWebsite();

  public function getFacebook();

  public function getTwitter();

  public function getYoutube();

  public function getRss();

  public function getDescription();

  public function getBanner();

  public function getBadge();

  public function getLogo();

  public function getPoster();

  public function getTrophy();

  public function getNaming();

  public function getLocked();

  public function getSeasons();
}
