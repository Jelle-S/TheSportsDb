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
   * Set the client to make requests with.
   *
   * @param \TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   The client to make the requests with.
   *
   * @return void
   */
  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient);

  /**
   * Lazy loads an entity.
   *
   * @throws \Exception
   *   When the entity is not found.
   *
   * @return void
   */
  public function load();
}
