<?php

namespace TheSportsDb\PropertyMapper;

/**
 * Describes a property map definition.
 *
 * @author Jelle Sebreghts
 */
class PropertyMapDefinition {

  /**
   * The property maps.
   *
   * @var \TheSportsDb\PropertyMapper\PropertyMap[]
   */
  protected $propertyMaps = [];

  /**
   * Adds a property map.
   * @param \TheSportsDb\PropertyMapper\PropertyDefinition $source
   *   The source property definition.
   * @param \TheSportsDb\PropertyMapper\PropertyDefinition $destination
   *   The destination property definition.
   * @param callable $transform
   *   The transform method.
   * @param callable $reverse
   *   The reverse method.
   *
   * @return $this
   */
  public function addPropertyMap(PropertyDefinition $source, PropertyDefinition $destination, callable $transform = NULL, callable $reverse = NULL) {
    $this->propertyMaps[] = new PropertyMap(
      $source,
      $destination,
      $transform,
      $reverse
    );
    return $this;
  }

  /**
   * Gets the property maps.
   *
   * @return \TheSportsDb\PropertyMapper\PropertyMap[]
   *   The property maps.
   */
  public function getPropertyMaps() {
    return $this->propertyMaps;
  }


}
