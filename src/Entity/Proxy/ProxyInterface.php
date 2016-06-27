<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\ProxyInterface.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\EntityManagerConsumerInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;

/**
 * Interface for proxy objects.
 *
 * @author Jelle Sebreghts
 */
interface ProxyInterface extends EntityInterface, EntityManagerConsumerInterface {

  /**
   * @return void
   */
  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient);
}
