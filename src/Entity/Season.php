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
    array('strSeason', 'id'),
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
    $id = $value;
    if (is_object($value)) {
      $id = $value->idLeague;
      $league = $value;
    }
    else {
      $league = (object) array('idLeague' => $id);
      if (isset($context->strLeague)) {
        $league->strLeague = $context->strLeague;
      }
    }
    $leagueEntity = $entityManager->repository('league')->byId($id);
    // Update with given values.
    $leagueEntity->update($league);
    return $leagueEntity;
  }

  public static function transformEvents(array $values, $context, EntityManagerInterface $entityManager) {
    $mapped_events = array();
    foreach ($values as $event_data) {
      $mapped_events[] = $entityManager->repository('event')->byId($event_data->idEvent);
    }
    return $mapped_events;
  }
}
