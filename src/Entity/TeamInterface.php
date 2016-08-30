<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\TeamInterface.
 */

namespace TheSportsDb\Entity;

/**
 * Interface for teams.
 *
 * @author Jelle Sebreghts
 */
interface TeamInterface extends EntityInterface {

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
   *   The teamname.
   */
  public function getName();

  /**
   * Gets the short name.
   *
   * @return string
   *   The short teamname.
   */
  public function getTeamShort();

  /**
   * Gets the alternate name.
   *
   * @return string
   *   The alternate team name.
   */
  public function getAlternateName();

  /**
   * Gets the year in which the team was formed.
   *
   * @return int
   *   The year in which the team was formed.
   */
  public function getFormedYear();

  /**
   * Gets the sport.
   *
   * @return \TheSportsDb\Entity\SportInterface
   *   The sport of this team.
   */
  public function getSport();

  /**
   * Gets the league.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league of this team.
   */
  public function getLeague();

  /**
   * Gets the division.
   *
   * @return string
   *   The division of this team.
   */
  public function getDivision();

  /**
   * Gets the manager.
   *
   * @return string
   *   The manager of this team.
   */
  public function getManager();

  /**
   * Gets the stadium.
   *
   * @return
   *   The stadium of this team.
   */
  public function getStadium();

  /**
   * Gets the keywords
   *
   * @return string
   *   The keywords for this team.
   */
  public function getKeywords();

  /**
   * Gets the rss.
   *
   * @return string
   *   The rss feed for this team.
   */
  public function getRss();

  /**
   * Gets the stadium thumbnail.
   *
   * @return string
   *   The link to the stadium thumbnail.
   */
  public function getStadiumThumb();

  /**
   * Gets the stadium description.
   *
   * @return string
   *   The description of the stadium of this team.
   */
  public function getStadiumDescription();

  /**
   * Gets the location of the stadium.
   *
   * @return string
   *   The location of the stadium of this team.
   */
  public function getStadiumLocation();

  /**
   * Gets the capacity of the stadium.
   *
   * @return int
   *   The capacity of the stadium of this team.
   */
  public function getStadiumCapacity();

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
   * Gets the Instagram.
   *
   * @return string
   *   The URL to the Instagram page of this team.
   */
  public function getInstagram();

  /**
   * Gets the description.
   *
   * @return string
   *   The description of this team.
   */
  public function getDescription();

  /**
   * Gets the gender.
   *
   * @return string
   *   The gender of this team.
   */
  public function getGender();

  /**
   * Gets the country of this team.
   *
   * @return string
   *   The country of this team.
   */
  public function getCountry();

  /**
   * Gets the badge.
   *
   * @return string
   *   The URL to the badge of this team.
   */
  public function getBadge();

  /**
   * Gets the jersey.
   *
   * @return string
   *   The URL to the jersey of this team.
   */
  public function getJersey();

  /**
   * Gets the logo.
   *
   * @return string
   *   The URL to the logo of this team.
   */
  public function getLogo();

  /**
   * Gets the banner.
   *
   * @return string
   *   The URL to the banner of this team.
   */
  public function getBanner();

  /**
   * Gets the youtube profile.
   *
   * @return string
   *   The URL to the youtube profile of this team.
   */
  public function getYoutube();

  /**
   * Whether this team is locked or not.
   *
   * @return string
   *   Returns 'locked' or 'unlocked'.
   */
  public function getLocked();
}
