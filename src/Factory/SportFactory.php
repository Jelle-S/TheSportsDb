<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\SportFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default sport factory implementation.
 *
 * @author Jelle Sebreghts
 */
class SportFactory extends Factory implements SportFactoryInterface {
  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\SportProxy', 'TheSportsDb\Entity\Sport');
  }
}
