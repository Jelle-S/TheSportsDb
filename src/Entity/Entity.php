<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TheSportsDb\Entity;

/**
 * Description of Entity
 *
 * @author drupalpro
 */
abstract class Entity implements EntityInterface {

  protected static $propertyMapDefinition = array();

  /**
   * Creates a new Entity object.
   *
   * @param \stdClass $values
   *   The entity data.
   */
  public function __construct(\stdClass $values) {
    foreach ((array) $values as $prop => $val) {
      if (property_exists($this, $prop)) {
        $this->{$prop} = $val;
      }
    }
  }

  public function raw() {
    $raw = new \stdClass();
    $reflection = new \ReflectionClass($this);
    $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      $methodName = $method->getName();
      if (strpos($methodName, 'get') === 0) {
        $prop = lcfirst(substr($methodName, 3));
        if ($reflection->hasProperty($prop)) {
          $val = $this->{$methodName}();
          $raw->{$prop} = $val;
          if (method_exists($val, 'raw')) {
            $raw->{$prop} = $val->raw();
          }
          elseif (is_array($val)) {
            $raw->{$prop} = array();
            foreach ($val as $v) {
              $raw->{$prop}[] = method_exists($v, 'raw') ? $v->raw() : $v;
            }
          }
        }
      }
    }
    return $raw;
  }

  public static function getEntityType() {
    $reflection = new \ReflectionClass(static::class);
    return strtolower($reflection->getShortName());
  }

  public static function getPropertyMapDefinition() {
    return static::$propertyMapDefinition;
  }
}
