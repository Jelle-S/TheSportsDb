<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\ProxyInterface.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Entity\EntityManagerInterface;

/**
 * Interface for proxy objects.
 *
 * @author Jelle Sebreghts
 */
interface ProxyInterface extends EntityInterface {

  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient);

  public function setEntityManager(EntityManagerInterface $entityManager);
}
