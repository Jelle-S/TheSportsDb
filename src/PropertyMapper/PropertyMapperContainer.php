<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TheSportsDb\PropertyMapper;

/**
 * Description of PropertyMapperContainer
 *
 * @author drupalpro
 */
class PropertyMapperContainer implements PropertyMapperContainerInterface {
  protected $propertyMappers = array();

  public function addPropertyMapper(PropertyMapperInterface $propertyMapper) {
    $this->propertyMappers[$propertyMapper->getDestinationClass()] = $propertyMapper;
  }

  public function getPropertyMapper($class) {
    if (!isset($this->propertyMappers[$class])) {
      throw new \Exception('No property mapper registered for ' . $class);
    }
    return $this->propertyMappers[$class];
  }

}
