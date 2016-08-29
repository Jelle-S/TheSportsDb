<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\SeasonInterface.
 */

namespace TheSportsDb\Entity;


/**
 * Interface for seasons.
 *
 * @author Jelle Sebreghts
 */
interface SeasonInterface extends EntityInterface {

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
   * getEvents
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
  public function getEvents();

  /**
   * getLeague
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
  public function getLeague();
}
