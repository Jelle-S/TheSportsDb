<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * Description of Property
 *
 * @author drupalpro
 */
class PropertyDefinition {

  protected $name;

  protected $entityType;

  protected $isArray;

  /**
   * @param string $name
   * @param string $entityType
   */
  public function __construct($name, $entityType = NULL, $isArray = FALSE) {
    $this->name = $name;
    $this->entityType = $entityType;
    $this->isArray = $isArray;
  }

  public function getName() {
    return $this->name;
  }

  public function getEntityType() {
    return $this->entityType;
  }

  public function isArray() {
    return $this->isArray;
  }
}
