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
  public function __construct(\stdClass $values);

  public function update(\stdClass $values);

  public function raw();

  public static function getEntityType();

  public static function getPropertyMapDefinition();
}
