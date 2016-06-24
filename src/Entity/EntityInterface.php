<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityInterface.
 */

namespace TheSportsDb\Entity;

/**
 * Interface for entities.
 *
 * @author Jelle Sebreghts
 */
interface EntityInterface {

  /**
   * @return void
   */
  public function __construct(\stdClass $values);

  /**
   * @return void
   */
  public function update(\stdClass $values);

  public function raw();

  /**
   * @return string
   */
  public static function getEntityType();

  public static function getPropertyMapDefinition();
}
