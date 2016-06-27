<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Sport.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

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
      array(League::class, 'reverseArray'),
    )),
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

  public static function transformLeagues($values, $context, EntityManagerInterface $entityManager) {
    $mappedLeagues = array();
    foreach ($values as $league_data) {
      $mappedLeagues[] = $entityManager->repository('league')->byId($league_data->idLeague);
    }
    return $mappedLeagues;
  }
}
