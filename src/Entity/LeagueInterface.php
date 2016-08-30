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
   * Gets the sport.
   *
   * @return \TheSportsDb\Entity\SportInterface
   *   The sport of this team.
   */
  public function getSport();

  /**
   * Gets the alternate name.
   *
   * @return string
   *   The alternate name.
   */
  public function getAlternateName();

  /**
   * Gets the year this league was formed.
   *
   * @return int
   *   The year this league was formed.
   */
  public function getFormedYear();

  /**
   * Gets the date of the first event.
   *
   * @return string
   *   The date of the first event.
   */
  public function getDateFirstEvent();

  /**
   * Gets the gender.
   *
   * @return string
   *   The gender.
   */
  public function getGender();

  /**
   * Gets the country.
   *
   * @return string
   *   The country.
   */
  public function getCountry();

  /**
   * Gets the website.
   *
   * @return string
   *   The URL to the website of this team.
   */
  public function getWebsite();

  /**
   * Gets the Facebook page.
   *
   * @return string
   *   The URL to the facebook page of this team.
   */
  public function getFacebook();

  /**
   * Gets the Twitter profile page.
   *
   * @return string
   *   The URL to the twitter profile page of this team.
   */
  public function getTwitter();

  /**
   * Gets the youtube URL.
   *
   * @return string
   *   The URL to the youtube page of this team.
   */
  public function getYoutube();

  /**
   * Gets the RSS URL.
   *
   * @return string
   *   The URL to the RSS.
   */
  public function getRss();

  /**
   * Gets the description.
   *
   * @return string
   *   The description.
   */
  public function getDescription();

  /**
   * Gets the banner.
   *
   * @return string
   *   The URL to the banner.
   */
  public function getBanner();

  /**
   * Gets the badge.
   *
   * @return string
   *   The URL to the badge.
   */
  public function getBadge();

  /**
   * Gets the logo.
   *
   * @return string
   *   The URL to the logo.
   */
  public function getLogo();

  /**
   * Gets the poster.
   *
   * @return string
   *   The URL to the poster.
   */
  public function getPoster();

  /**
   * Gets the trophy.
   *
   * @return string
   *   The URL to the trophy.
   */
  public function getTrophy();

  /**
   * Gets the naming pattern for events.
   *
   * @return string
   *   The naming pattern for events.
   */
  public function getNaming();

  /**
   * Whether this team is locked or not.
   *
   * @return string
   *   Returns 'locked' or 'unlocked'.
   */
  public function getLocked();

  /**
   * Gets the seasons.
   *
   * @return \TheSportsDb\Entity\SeasonInterface[]
   *   The seasons.
   */
  public function getSeasons();
}
