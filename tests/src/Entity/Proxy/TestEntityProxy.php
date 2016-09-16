<?php

namespace TheSportsDb\Test\Entity\Proxy;

use TheSportsDb\Entity\Proxy\Proxy;

/**
 * Test stub class for proxy.
 *
 * @author Jelle Sebreghts
 */
class TestEntityProxy extends Proxy {

  protected function load() {

  }

  public function getId() {
    return $this>get('id');
  }

  public function getName() {
    return $this->get('name');
  }

}
