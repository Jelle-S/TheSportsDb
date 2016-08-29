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
   * Creates a new entity.
   *
   * @param \stdClass $values
   *   The values to create this entity with.
   */
  public function __construct(\stdClass $values);

  /**
   * Updates the entity.
   *
   * @param \stdClass $values
   *   The values to update the entity with
   *
   * @return void
   */
  public function update(\stdClass $values);

  /**
   * Get this entity as a raw (\stdClass) object.
   *
   * @return \stdClass
   *   The raw entity values.
   */
  public function raw();

  /**
   * Gets the entity type of this entity class.
   *
   * @return string
   *   The entity type of this entity class.
   */
  public static function getEntityType();

  /**
   * Gets the property map for this entity class.
   *
   * @return array
   *   The property map definition.
   */
  public static function getPropertyMapDefinition();
}
