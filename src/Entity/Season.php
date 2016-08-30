<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Season.
 */

namespace TheSportsDb\Entity;

use TheSportsDb\Entity\EntityManagerInterface;

/**
 * A fully loaded season object.
 *
 * @author Jelle Sebreghts
 */
class Season extends Entity implements SeasonInterface {

  /**
   * The property map definition.
   *
   * @var array
   */
  protected static $propertyMapDefinition = array(
    array('strSeason', 'id', array(
      array(self::class, 'transformId'),
      array(self::class, 'reverseId'),
    )),
    array('strSeason', 'name'),
    array('idLeague', 'league', array(
      array(self::class, 'transformLeague'),
      array(League::class, 'reverse'),
    )),
    array('events', 'events', array(
      array(self::class, 'transformEvents'),
      array(Event::class, 'reverseArray'),
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
   * The league of this season.
   *
   * @var \TheSportsDb\Entity\LeagueInterface
   */
  protected $league;

  /**
   * The events of this season.
   *
   * @var \TheSportsDb\Entity\EventInterface[]
   */
  protected $events = array();

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
  public function getLeague() {
    return $this->league;
  }

  /**
   * {@inheritdoc}
   */
  public function getEvents() {
    return $this->events;
  }

  /**
   * Transforms the league property to a league entity.
   *
   * @param mixed $value
   *   The source value of the league property.
   * @param \stdClass $context
   *   The source object representing this season.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   *   The league entity.
   */
  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    return static::transform($value, $context, $entityManager, 'league', 'idLeague', array('strLeague' => 'strLeague'));
  }

  /**
   * Transforms the events property to event entities.
   *
   * @param array $values
   *   The source value of the event property.
   * @param \stdClass $context
   *   The source object representing this season.
   * @param EntityManagerInterface $entityManager
   *   The entity manager.
   *
   * @return \TheSportsDb\Entity\EventInterface[]
   *   The event entity.
   */
  public static function transformEvents(array $values, $context, EntityManagerInterface $entityManager) {
    $mappedEvents = array();
    foreach ($values as $eventData) {
      $mappedEvents[] = $entityManager->repository('event')->byId($eventData->idEvent);
    }
    return $mappedEvents;
  }

  /**
   * Transforms the id property to a unique identifier.
   *
   * @param mixed $value
   *   The source value of the id property.
   * @param \stdClass $context
   *   The source object representing this season.
   *
   * @return string
   *   The unique identifier.
   */
  public static function transformId($value, $context) {
    return $value . '|' . $context->idLeague;
  }

  /**
   * Reverses the transformation of the id property.
   *
   * @param mixed $value
   *   The source value of the id property.
   * @param \stdClass $context
   *   The source object representing this season.
   *
   * @return string
   *   The id property value.
   */
  public static function reverseId($value, $context) {
    $id = explode('|', $value);
    return reset($id);
  }
}
