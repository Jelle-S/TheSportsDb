<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\SeasonFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default season factory implementation.
 *
 * @author Jelle Sebreghts
 */
class SeasonFactory extends Factory implements SeasonFactoryInterface {
  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\SeasonProxy', 'TheSportsDb\Entity\Season');
  }
}
