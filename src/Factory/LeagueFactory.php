<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\LeagueFactory.
 */

namespace TheSportsDb\Factory;

/**
 * The default league factory implementation.
 *
 * @author Jelle Sebreghts
 */
class LeagueFactory extends Factory implements LeagueFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(\stdClass $values) {
    return $this->createObject($values, 'TheSportsDb\Entity\Proxy\LeagueProxy', 'TheSportsDb\Entity\League');
  }

}
