<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\PropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * Default property mapper.
 *
 * @author Jelle Sebreghts
 */
abstract class AbstractPropertyMapper implements PropertyMapperInterface {

  /**
   * The properties to map.
   *
   * @var array
   */
  protected $propertyMap = array();

  /**
   * Callbacks for mapping properties.
   *
   * @var array
   */
  protected $propertyCallbacks = array();

  /**
   * The fully qualified classname of the class this property mapper is for.
   *
   * @var string
   */
  protected $destinationClass;

  /**
   * {@inheritdoc}
   */
  public function map(\stdClass $values) {
    $properties = new \stdClass();
    foreach ($this->propertyMap as $dest => $source) {
      if (property_exists($values, $source)) {
        $properties->{$dest} = isset($this->propertyCallbacks[$dest]) ? $this->{$this->propertyCallbacks[$dest]}($values->{$source}, $values): $values->{$source};
      }
    }
    return $properties;
  }

  public function reverseMap(\stdClass $values) {
    $properties = new \stdClass();
    foreach ($this->propertyMap as $dest => $source) {
      if (property_exists($values, $dest)) {
        $properties->{$source} = isset($this->propertyCallbacks[$dest]) ? $this->{$this->propertyCallbacks[$dest]}($values->{$dest}, $values, TRUE): $values->{$dest};
      }
    }
    return $properties;
  }

  public function getDestinationClass() {
    return $this->destinationClass;
  }

  public function setDestinationClass($class) {
    $this->destinationClass = ltrim($class, '\\');
  }

}
