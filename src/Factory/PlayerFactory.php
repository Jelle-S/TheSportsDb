<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\PlayerFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default player factory implementation.
 *
 * @author Jelle Sebreghts
 */
class PlayerFactory extends Factory implements PlayerFactoryInterface {
  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\PlayerProxy', 'TheSportsDb\Entity\Player');
  }
}
