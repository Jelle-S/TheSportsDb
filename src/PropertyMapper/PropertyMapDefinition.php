<?php

namespace TheSportsDb\PropertyMapper;

/**
 * Describes a property map definition.
 *
 * @author Jelle Sebreghts
 */
class PropertyMapDefinition {

  protected $propertyMaps = [];

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
   */
  public function getPropertyMaps() {
    return $this->propertyMaps;
  }


}
