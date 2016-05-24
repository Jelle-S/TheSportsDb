<?php
/**
 * @file
 * Contains \TheSportsDb\PropertyMapper\SeasonPropertyMapper.
 */

namespace TheSportsDb\PropertyMapper;

use TheSportsDb\Factory\FactoryInterface;

/**
 * Property mapper for season.
 *
 * @author Jelle Sebreghts
 */
class SeasonPropertyMapper extends AbstractPropertyMapper {

  /**
   * {@inheritdoc}
   */
  protected $propertyMap = array(
    'id' => 'strSeason',
    'name' => 'strSeason',
    'league' => 'idLeague',
    'events' => 'events'
  );

  /**
   * {@inheritdoc}
   */
  protected $propertyCallbacks = array(
    'league' => 'mapLeague',
    'events' => 'mapEvents',
  );
  
  /**
   * The league factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $leagueFactory;

  /**
   * The event factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $eventFactory;

  protected $destinationClass = 'TheSportsDb\Entity\Season';

  public function setLeagueFactory(FactoryInterface $leagueFactory) {
    $this->leagueFactory = $leagueFactory;
  }

  public function setEventFactory(FactoryInterface $eventFactory) {
    $this->eventFactory = $eventFactory;
  }

  public function mapLeague($leagueId, \stdClass $values, $reverse = FALSE) {
    if (!$reverse && !($this->leagueFactory instanceof FactoryInterface)) {
        throw new \Exception('No league factory set.');
    }
    return $reverse ? $leagueId->getId() : $this->leagueFactory->create((object) array('idLeague' => $leagueId));
  }

  public function mapEvents(array $events, \stdClass $values, $reverse = FALSE) {
    if (!$reverse) {
      if (!($this->eventFactory instanceof FactoryInterface)) {
        throw new \Exception('No event factory set.');
      }
      $mapped_events = array();
      foreach ($events as $event_data) {
        $event = $this->eventFactory->create($event_data);
        $mapped_events[$event->getId()] = $event;
      }
      return $mapped_events;
    }
    $mapped_events = array();
    foreach ($events as $event) {
      $mapped_events[] = (object) array('idEvent' => $event->getId());
    }
    return $mapped_events;
  }

}
