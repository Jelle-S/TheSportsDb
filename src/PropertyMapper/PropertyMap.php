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

  protected $source;

  protected $destination;

  protected $transform;

  protected $reverse;

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
   * Gets the source property.
   *
   * @return PropertyDefinition
   */
  public function getSource() {
    return $this->source;
  }

  /**
   * Gets the destination property.
   *
   * @return PropertyDefinition
   */
  public function getDestination() {
    return $this->destination;
  }

  public function getTransform() {
    return $this->transform;
  }

  public function getReverse() {
    return $this->reverse;
  }

}
