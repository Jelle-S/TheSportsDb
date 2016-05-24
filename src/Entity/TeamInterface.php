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

  public function getId();

  public function getTeamName();

  public function getTeamShort();

  public function getAlternateName();

  public function getFormedYear();

  public function getSport();

  public function getLeague();

  public function getDivision();

  public function getManager();

  public function getStadium();

  public function getKeywords();

  public function getRss();

  public function getStadiumThumb();

  public function getStadiumDescription();

  public function getStadiumLocation();

  public function getStadiumCapacity();

  public function getWebsite();

  public function getFacebook();

  public function getTwitter();

  public function getInstagram();

  public function getDescription();

  public function getGender();

  public function getCountry();

  public function getBadge();

  public function getJersey();

  public function getLogo();

  public function getBanner();

  public function getYoutube();

  public function getLocked();
}
