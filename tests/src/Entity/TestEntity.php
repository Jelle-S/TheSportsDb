<?php

namespace TheSportsDb\Test\Entity;

use TheSportsDb\Entity\Entity;
use TheSportsDb\PropertyMapper\PropertyDefinition;

/**
 * Test stub class for entity.
 *
 * @author Jelle Sebreghts
 */
class TestEntity extends Entity {

  protected static $initCounter = 0;

  protected static $getCounter = 0;

  protected $id;

  protected $name;

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  protected static function initPropertyMapDefinition() {
    static $once = FALSE;
    if (static::$initCounter > 0) {
      throw new \Exception('Entity::initPropertyMapDefinition should only be called once.');
    }
    static::$initCounter++;
    static::$propertyMapDefinition
      ->addPropertyMap(
        new PropertyDefinition('testId'),
        new PropertyDefinition('id')
      )
      ->addPropertyMap(
        new PropertyDefinition('testName'),
        new PropertyDefinition('name')
      );
  }

  public static function getPropertyMapDefinition() {
    if (static::$getCounter > 0) {
      throw new \Exception('Entity::getPropertyMapDefinition should only be called once.');
    }
    static::$getCounter++;
    return parent::getPropertyMapDefinition();
  }

  public static function resetStatics($statics = array()) {
    if (empty($statics) || in_array('init', $statics)) {
      static::$initCounter = 0;
    }
    if (empty($statics) || in_array('get', $statics)) {
      static::$getCounter = 0;
    }
  }
}
