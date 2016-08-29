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
   * getId
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getId();

  /**
   * getName
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getName();

  /**
   * getSport
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSport();

  /**
   * getAlternateName
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getAlternateName();

  /**
   * getFormedYear
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getFormedYear();

  /**
   * getDateFirstEvent
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getDateFirstEvent();

  /**
   * getGender
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getGender();

  /**
   * getCountry
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getCountry();

  /**
   * getWebsite
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getWebsite();

  /**
   * getFacebook
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getFacebook();

  /**
   * getTwitter
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTwitter();

  /**
   * getYoutube
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getYoutube();

  /**
   * getRss
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getRss();

  /**
   * getDescription
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getDescription();

  /**
   * getBanner
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getBanner();

  /**
   * getBadge
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getBadge();

  /**
   * getLogo
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLogo();

  /**
   * getPoster
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getPoster();

  /**
   * getTrophy
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getTrophy();

  /**
   * getNaming
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getNaming();

  /**
   * getLocked
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getLocked();

  /**
   * getSeasons
   * Insert description here
   *
   *
   * @return
   *
   * @access
   * @static
   * @see
   * @since
   */
  public function getSeasons();
}
