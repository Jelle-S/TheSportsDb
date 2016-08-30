<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * Description of PropertyMap
 *
 * @author drupalpro
 */
class PropertyMap {

  /**
   * The source property definition.
   *
   * @var \TheSportsDb\PropertyMapper\PropertyDefinition
   */
  protected $source;

  /**
   * The destination property definition.
   *
   * @var \TheSportsDb\PropertyMapper\PropertyDefinition
   */
  protected $destination;

  /**
   * The transform method.
   *
   * @var callable
   */
  protected $transform;

  /**
   * The reverse method.
   *
   * @var callable
   */
  protected $reverse;

  /**
   * Creates a new property map.
   *
   * @param \TheSportsDb\PropertyMapper\PropertyDefinition $source
   *   The source property definition.
   * @param \TheSportsDb\PropertyMapper\PropertyDefinition $destination
   *   The destination property definition.
   * @param callable|null $transform
   *   The transform method.
   * @param callable|null $reverse
   *   The reverse method
   *
   * @throws \InvalidArgumentException
   *   When either $transform or $reverse is null and the other isn't.
   */
  public function __construct(PropertyDefinition $source, PropertyDefinition $destination, callable $transform = NULL, callable $reverse = NULL) {
    $this->source = $source;
    $this->destination = $destination;
    if (is_null($transform) !== is_null($reverse)) {
      throw new \InvalidArgumentException('Each transform function should have a reverse function and vice versa.');
    }
    $this->transform = $transform;
    $this->reverse = $reverse;
  }

  /**
   * Gets the source property definition.
   *
   * @return PropertyDefinition
   *   The source property definition.
   */
  public function getSource() {
    return $this->source;
  }

  /**
   * Gets the destination property definition.
   *
   * @return PropertyDefinition
   *   The destination property definition.
   */
  public function getDestination() {
    return $this->destination;
  }

  /**
   * Gets the transform method.
   *
   * @return callable|null
   *   The transform method if set, NULL otherwise.
   */
  public function getTransform() {
    return $this->transform;
  }

  /**
   * Gets the reverse method.
   *
   * @return callable|null
   *   The reverse method if set, NULL otherwise.
   */
  public function getReverse() {
    return $this->reverse;
  }

}
