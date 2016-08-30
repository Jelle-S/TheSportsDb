<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\PlayerInterface.
 */

namespace TheSportsDb\Entity;


/**
 * Interface for players.
 *
 * @author Jelle Sebreghts
 */
interface PlayerInterface extends EntityInterface {

  /**
   * Gets the primary identifier.
   *
   * @return int
   *   The primary identifier.
   */
  public function getId();

  /**
   * Gets the team of this player.
   *
   * @return \TheSportsDb\Entity\TeamInterface
   *   The team of this player.
   */
  public function getTeam();

  /**
   * Gets the nationality.
   *
   * @return string
   *   The nationality.
   */
  public function getNationality();

  /**
   * Gets the name
   *
   * @return string
   *   The name.
   */
  public function getName();

  /**
   * Gets the sport of this player.
   *
   * @return \TheSportsDb\Entity\SportInterface
   *   The sport of this player.
   */
  public function getSport();

  /**
   * Gets the birthday
   *
   * @return string
   *   The birthday.
   */
  public function getBirthDay();

  /**
   * Gets the date this player signed.
   *
   * @return string
   *   The date this player signed.
   */
  public function getDateSigned();

  /**
   * Gets the amount the player signed for.
   *
   * @return string
   *   The amount the player signed for.
   */
  public function getSigning();

  /**
   * Gets the wage.
   *
   * @return string
   *   The wage.
   */
  public function getWage();

  /**
   * Gets the birth location.
   *
   * @return string
   *   The birth location.
   */
  public function getBirthLocation();

  /**
   * Gets the description.
   *
   * @return string
   *   The description.
   */
  public function getDescription();

  /**
   * Gets the gender.
   *
   * @return string
   *   The gender.
   */
  public function getGender();

  /**
   * Gets the position.
   *
   * @return string
   *   The position.
   */
  public function getPosition();

  /**
   * Gets the facebook URL.
   *
   * @return string
   *   The facebook URL.
   */
  public function getFacebook();

  /**
   * Gets the website URL.
   *
   * @return string
   *   The website URL.
   */
  public function getWebsite();

  /**
   * Gets the twitter profile URL.
   *
   * @return string
   *   The twitte profile URL.
   */
  public function getTwitter();

  /**
   * Gets the instagram URL.
   *
   * @return string
   *   The instagram URL.
   */
  public function getInstagram();

  /**
   * Gets the youtube URL.
   *
   * @return string
   *   The youtube URL.
   */
  public function getYoutube();

  /**
   * Gets the height.
   *
   * @return float
   *   The height.
   */
  public function getHeight();

  /**
   * Gets the weight.
   *
   * @return float
   *   The weight.
   */
  public function getWeight();

  /**
   * Gets the thumbnail URL.
   *
   * @return string
   *   The thumbnail URL.
   */
  public function getThumb();

  /**
   * Gets the cutout URL.
   *
   * @return string
   *   The cutout URL.
   */
  public function getCutout();

  /**
   * Whether this player is locked or not.
   *
   * @return string
   *   Returns 'locked' or 'unlocked'.
   */
  public function getLocked();

}
