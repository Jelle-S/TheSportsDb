<?php

namespace TheSportsDb\Test\Entity;

use TheSportsDb\Entity\Entity;

/**
 * Test stub class for entity.
 *
 * @author Jelle Sebreghts
 */
class TestEntity extends Entity {
  protected static function initPropertyMapDefinition() {
    static $once = FALSE;
    if ($once) {
      throw new \Exception('Entity::initPropertyMapDefinition should only be called once.');
    }
    if (!$once) {
      $once = TRUE;
    }
  }
}
