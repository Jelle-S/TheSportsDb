<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Sport.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\PropertyMapper\PropertyDefinition;

/**
 * A fully loaded sport object.
 *
 * @author Jelle Sebreghts
 */
class Sport extends Entity implements SportInterface {

  /**
   * {@inheritdoc}
   */
  protected static $propertyMapDefinition;

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

  /**
   * {@inheritdoc}
   */
  protected static function initPropertyMapDefinition() {
    static::$propertyMapDefinition
      ->addPropertyMap(
        new PropertyDefinition('strSport'),
        new PropertyDefinition('id')
      )
      ->addPropertyMap(
        new PropertyDefinition('strSport'),
        new PropertyDefinition('name')
      )
      ->addPropertyMap(
        new PropertyDefinition('leagues'),
        new PropertyDefinition('leagues', 'league', TRUE),
        [self::class, 'transformLeagues'],
        [League::class, 'reverseArray']
      );
  }

}
