<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\ProxyInterface.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Factory\FactoryInterface;

/**
 * Interface for proxy objects.
 *
 * @author Jelle Sebreghts
 */
interface ProxyInterface extends EntityInterface {

  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient);

  public function setFactory(FactoryInterface $factory);
}
