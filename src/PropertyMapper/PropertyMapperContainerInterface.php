<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\PropertyMapperContainerInterface.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * An interface for property mapper containers.
 *
 * @author Jelle Sebreghts
 */
interface PropertyMapperContainerInterface {

  /**
   * Add a property mapper for a class.
   *
   * @param \TheSportsDb\PropertyMapper\PropertyMapperInterface $propertyMapper
   *   The property mapper to add.
   * @param string $class
   *   The fully qualified classname this property mapper is for.
   */
  public function addPropertyMapper(PropertyMapperInterface $propertyMapper);

  /**
   * Get the property mapper for a class.
   *
   * @param string $class
   *   The fully qualified classname this property mapper is for.
   *
   * @throws \Exception
   *   When the property mapper for this class is not registered.
   *
   * @return \TheSportsDb\PropertyMapper\PropertyMapperInterface
   *   The property mapper for this class.
   */
  public function getPropertyMapper($class);
}
