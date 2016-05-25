<?php
/**
 * @file
 * Contains \TheSportsDb\Query\Query.
 */

namespace TheSportsDb\Query;

use TheSportsDb\Factory\FactoryInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;

/**
 * Abstract Query implementation to inherit from.
 *
 * @author Jelle Sebreghts
 */
abstract class Query implements QueryInterface {
  
  /**
   * The factory that will create the entities once queried.
   * 
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $factory;

  /**
   * The sports db client.
   *
   * @var TheSportsDb\Http\TheSportsdbClientInterface
   */
  protected $sportsDbClient;

  public function __construct(FactoryInterface $factory, TheSportsDbClientInterface $sportsDbClient) {
    $this->factory = $factory;
    $this->sportsDbClient = $sportsDbClient;
  }

  /**
   * {@inheritdoc}
   */
  public function byId($id) {
    return $this->factory->create($this->factory->reverseMapProperties((object) array('id' => $id)));
  }
}
