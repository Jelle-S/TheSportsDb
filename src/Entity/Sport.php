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

  /**
   * The property map definition.
   *
   * @var array
   */
  protected static $propertyMapDefinition = array(
    array('strSport', 'id'),
    array('strSport', 'name'),
    array('leagues', 'leagues', array(
      array(self::class, 'transformLeagues'),
      array(League::class, 'reverseArray'),
    )),
  );

  /**
   * The primary identifier.
   *
   * @var mixed
   */
  protected $id;

  /**
   * The name.
   *
   * @var string
   */
  protected $name;

  /**
   * The leagues of this sport.
   *
   * @var \TheSportsDb\Entity\LeagueInterface[]
   */
  protected $leagues = array();

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
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

  /**
   * Transforms the leagues property to league entities.
   *
   * @param array $values
   *   The source value of the leagues property.
   * @param \stdClass $context
   *   The source object representing this sport.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\LeagueInterface[]
   *   The league entities.
   */
  public static function transformLeagues($values, $context, EntityManagerInterface $entityManager) {
    $mappedLeagues = array();
    foreach ($values as $leagueData) {
      $mappedLeagues[] = $entityManager->repository('league')->byId($leagueData->idLeague);
    }
    return $mappedLeagues;
  }
}
