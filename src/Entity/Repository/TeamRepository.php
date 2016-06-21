<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\TeamRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default TeamRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class TeamRepository extends Repository implements TeamRepositoryInterface {

  protected $entityType = 'team';

}
