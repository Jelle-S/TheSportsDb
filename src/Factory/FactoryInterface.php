<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\FactoryInterface.
 */

namespace TheSportsDb\Factory;

/**
 * Interface for factories.
 *
 * @author Jelle Sebreghts
 */
interface FactoryInterface {
  /**
   * Creates a sportsdb entity object based on given values.
   *
   * @param \stdClass $values
   *   The sport object as returned by the service.
   *
   * @return mixed
   *   The entity object.
   */
  public function create(\stdClass $values);

  /**
   * Maps properties.
   *
   * @param \stdClass $values
   *   The properties to map.
   *
   * @return \stdClass
   *   The mapped properties.
   */
  public function mapProperties(\stdClass $values);

  /**
   * Reverse maps properties.
   *
   * @param \stdClass $values
   *   The properties to reverse map.
   *
   * @return \stdClass
   *   The reverse mapped properties.
   */
  public function reverseMapProperties(\stdClass $values);

  /**
   * Get the entity type name this factory is for.
   *
   * @return string
   *   The entity type name of the entity this factory is for.
   */
  public function getEntityTypeName();

  public function isEmptyValue($value);
}
