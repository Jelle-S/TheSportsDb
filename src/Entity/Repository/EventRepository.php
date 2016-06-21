<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\EventRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default EventRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class EventRepository extends Repository implements EventRepositoryInterface {

  protected $entityType = 'event';

}
