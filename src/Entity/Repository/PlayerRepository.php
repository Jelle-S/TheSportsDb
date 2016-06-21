<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Repository\PlayerRepository.
 */

namespace TheSportsDb\Entity\Repository;

/**
 * The default PlayerRepository implementation.
 *
 * @author Jelle Sebreghts
 */
class PlayerRepository extends Repository implements PlayerRepositoryInterface {

  protected $entityType = 'player';

}
