<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\TeamFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default team factory implementation.
 *
 * @author Jelle Sebreghts
 */
class TeamFactory extends Factory implements TeamFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\TeamProxy', 'TheSportsDb\Entity\Team');
  }

}
