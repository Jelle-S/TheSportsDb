<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\ProxyInterface.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Entity\EntityManagerConsumerInterface;

/**
 * Interface for proxy objects.
 *
 * @author Jelle Sebreghts
 */
interface ProxyInterface extends EntityInterface, EntityManagerConsumerInterface {
  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient);
}
