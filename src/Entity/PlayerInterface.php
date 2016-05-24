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

  public function getId();

  public function getTeam();

  public function getNationality();

  public function getName();

  public function getSport();

  public function getBirthDay();

  public function getDateSigned();

  public function getSigning();

  public function getWage();

  public function getBirthLocation();

  public function getDescription();

  public function getGender();

  public function getPosition();

  public function getFacebook();

  public function getWebsite();

  public function getTwitter();

  public function getInstagram();

  public function getYoutube();

  public function getHeight();

  public function getWeight();

  public function getThumb();

  public function getCutout();

  public function getLocked();

}
