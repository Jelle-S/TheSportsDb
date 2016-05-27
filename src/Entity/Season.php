<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Season.
 */

namespace TheSportsDb\Entity;

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
      array(self::class, 'reverseLeague'),
    ), 'league'),
    array('events', 'events', array(
      array(self::class, 'transformEvents'),
      array(self::class, 'reverseEvents'),
    ), 'event'),
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

  public static function transformLeague($value, $context, FactoryInterface $factory) {
    if (is_object($value)) {
      $league = $value;
    }
    else {
      $league = (object) array('idLeague' => $value);
      if (isset($context->strLeague)) {
        $league->strLeague = $context->strLeague;
      }
    }
    return $factory->create($league);
  }

  public static function reverseLeague(LeagueInterface $league, $context, FactoryInterface $factory) {
    return $factory->reverseMapProperties($league->raw());
  }

  public static function transformEvents(array $values, $context, FactoryInterface $factory) {
    $mapped_events = array();
    foreach ($values as $event_data) {
      $mapped_events[] = $factory->create($event_data);
    }
    return $mapped_events;
  }

  public static function reverseEvents(array $events, $context, FactoryInterface $factory) {
    $reversed_events = array();
    foreach ($events as $event) {
      $reversed_events[] = $factory->reverseMapProperties($event->raw());
    }
    return $reversed_events;
  }
}
