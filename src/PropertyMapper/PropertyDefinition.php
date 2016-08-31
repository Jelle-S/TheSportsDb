<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\Factory\FactoryContainerInterface;

/**
 * Description of Property
 *
 * @author drupalpro
 */
class PropertyDefinition {

  /**
   * The property name.
   *
   * @var string
   */
  protected $name;

  /**
   * The entity type if this property is an entity.
   *
   * @var string
   */
  protected $entityType;

  /**
   * Whether this property is an array or not.
   *
   * @var bool
   */
  protected $isArray;

  /**
   * Creates a new property definition.
   *
   * @param string $name
   *   The name of the property.
   * @param string|null $entityType
   *   The entity type of the property if it's an entity.
   * @param bool $isArray
   *   Whether or not this property is an array.
   */
  public function __construct($name, $entityType = NULL, $isArray = FALSE) {
    $this->name = $name;
    $this->entityType = $entityType;
    $this->isArray = $isArray;
  }

  /**
   * Gets the property name.
   *
   * @return string
   *   The property name.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Gets the entity type.
   *
   * @return string|null
   *   The entity type of the property if it's an entity.
   */
  public function getEntityType() {
    return $this->entityType;
  }

  /**
   * Whether or not this property is an array.
   *
   * @return bool
   *   TRUE if it's an array, FALSE, otherwise.
   */
  public function isArray() {
    return $this->isArray;
  }

  /**
   * Sanitizes an object property based on this definition.
   *
   * @param \stdClass $object
   *   The object of which to sanitize the property.
   * @param \TheSportsDb\Entity\Factory\FactoryContainerInterface $factoryContainer
   *   The factory container.
   *
   * @return void
   */
  public function sanitizeProperty(\stdClass &$object, FactoryContainerInterface $factoryContainer) {
    if (($entityType = $this->getEntityType()) && isset($object->{$this->getName()})) {
      $value = &$object->{$this->getName()};
      if ($this->isArray()) {
        foreach ($value as &$val) {
          if ($val instanceof EntityInterface) {
            continue;
          }
          $val = $factoryContainer->getFactory($entityType)->create($val, $entityType);
        }
      }
      elseif (!($value instanceof EntityInterface)) {
        $value = $factoryContainer->getFactory($entityType)->create($value, $entityType);
      }
    }
  }
}
