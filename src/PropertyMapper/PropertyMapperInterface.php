<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\PropertyMapperInterface.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * An interface for property mappers.
 *
 * @author Jelle Sebreghts
 */
interface PropertyMapperInterface {

  /**
   * Maps properties.
   *
   * @param \stdClass $values
   *   The properties to map.
   *
   * @return \stdClass
   *   The mapped properties.
   */
  public function map(\stdClass $values);

  /**
   * Reverse maps properties.
   *
   * @param \stdClass $values
   *   The properties to reverse map.
   *
   * @return \stdClass
   *   The reverse mapped properties.
   */
  public function reverseMap(\stdClass $values);

  /**
   * Get the class this property mapper is for.
   *
   * @return string
   *   The fully qualified classname.
   */
  public function getDestinationClass();

  /**
   * Set the class this property mapper is for.
   *
   * @var string $class
   *   The fully qualified classname.
   */
  public function setDestinationClass($class);

}
