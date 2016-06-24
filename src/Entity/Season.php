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

  protected $id;
  protected $name;

  /**
   * The league of this season.
   *
   * @var \TheSportsDb\Entity\LeagueInterface
   */
  protected $league;

  protected $events = array();

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getLeague() {
    return $this->league;
  }

  public function getEvents() {
    return $this->events;
  }

  public static function transformLeague($value, $context, EntityManagerInterface $entityManager) {
    $data = static::transformHelper($value, $context, 'idLeague', array('strLeague' => 'strLeague'));
    $leagueEntity = $entityManager->repository('league')->byId($data['id']);
    // Update with given values.
    $leagueEntity->update($data['object']);
    return $leagueEntity;
  }

  public static function transformEvents(array $values, $context, EntityManagerInterface $entityManager) {
    $mappedEvents = array();
    foreach ($values as $eventData) {
      $mappedEvents[] = $entityManager->repository('event')->byId($eventData->idEvent);
    }
    return $mappedEvents;
  }

  public static function transformId($value, $context) {
    return $value . '|' . $context->idLeague;
  }

  public static function reverseId($value, $context) {
    $id = explode('|', $value);
    return reset($id);
  }
}
