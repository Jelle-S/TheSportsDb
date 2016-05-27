<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Sport.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Factory\FactoryInterface;

/**
 * A fully loaded sport object.
 *
 * @author Jelle Sebreghts
 */
class Sport extends Entity implements SportInterface {

  protected static $propertyMapDefinition = array(
    array('strSport', 'id'),
    array('strSport', 'name'),
    array('leagues', 'leagues', array(
      array(self::class, 'transformLeagues'),
      array(self::class, 'reverseLeagues'),
    ), 'league'),
  );

  protected $id;
  protected $name;
  protected $leagues = array();

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getLeagues() {
    return $this->leagues;
  }

  /**
   * {@inheritdoc}
   */
  public function addLeague(LeagueInterface $league) {
    if (!isset($this->leagues[$league->getId()])) {
      $this->leagues[$league->getId()] = $league;
    }
  }

  public static function transformLeagues($values, $context, FactoryInterface $factory) {
    $mapped_leagues = array();
    foreach ($values as $league_data) {
      $mapped_leagues[] = $factory->create($league_data);
    }
    return $mapped_leagues;
  }

  public static function reverseLeagues($leagues, $context, FactoryInterface $factory) {
    $reversed_leagues = array();
    foreach ($leagues as $league) {
      $reversed_leagues[] = $factory->reverseMapProperties($league->raw());
    }
    return $reversed_leagues;
  }
}
