<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\EventFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default event factory implementation.
 *
 * @author Jelle Sebreghts
 */
class EventFactory extends Factory implements EventFactoryInterface {
  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\EventProxy', 'TheSportsDb\Entity\Event');
  }
}
