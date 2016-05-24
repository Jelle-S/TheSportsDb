<?php
/**
 * @file
 * The main sportsdb class.
 */

namespace TheSportsDb;

use Psr\Cache\CacheItemPoolInterface;
use Cache\Adapter\Common\CacheItem;
use TheSportsDb\Factory\FactoryInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;
/**
 * Main API class for TheSportsDb.
 *
 * @author Jelle Sebreghts
 */
class TheSportsDb {

  /**
   * The sports db client.
   *
   * @var TheSportsDb\Http\TheSportsdbClientInterface
   */
  protected $sportsDbClient;

  /**
   * The cache storage.
   *
   * @var Psr\Cache\CacheItemPoolInterface
   */
  protected $cache;

  /**
   * The league factory.
   *
   * @var TheSportsDb\Factory\FactoryInterface
   */
  protected $leagueFactory;

    /**
   * The sport factory.
   *
   * @var TheSportsDb\Factory\FactoryInterface
   */
  protected $sportFactory;

  /**
   * Creates a new TheSportsDb instance
   *
   * @param string $api_key
   *   The API key.
   * @param \TheSportsDb\Http\TheSportsDbClientInterface $client
   *   The HTTP client.
   * @param \Psr\Cache\CacheItemPoolInterface $cache
   *   The cache storage.
   */
  public function __construct($api_key, TheSportsDbClientInterface $sportsDbClient, CacheItemPoolInterface $cache, FactoryInterface $leagueFactory, FactoryInterface $sportFactory) {
    $this->apiKey = $api_key;
    $this->sportsDbClient = $sportsDbClient;
    $this->cache = $cache;
    $this->leagueFactory = $leagueFactory;
    $this->sportFactory = $sportFactory;
  }

  public function getSports() {
    $cache = $this->cache->getItem('sports');
    if (!$cache->isHit()) {
      $this->doLeaguesRequest();
      $cache = $this->cache->getItem('sports');
    }
    return $cache->get();
  }

  /**
   * Get a sport by name.
   *
   * @param string $name
   *   The sport name.
   *
   * @return \TheSportsDb\Entity\SportInterface
   */
  public function getSport($name) {
    // Do we have sports in cache?
    $cache = $this->cache->getItem('sports');
    if ($cache->isHit()) {
      $sports = $cache->get();
      if (isset($sports[$name])) {
        return $sports[$name];
      }
    }
    return $this->sportFactory->create((object) array('strSport' => $name));
  }

  public function getLeagues() {
    $cache = $this->cache->getItem('leagues');
    if (!$cache->isHit()) {
      $this->doLeaguesRequest();
      $cache = $this->cache->getItem('leagues');
    }
    return $cache->get();
  }

  /**
   * Get a league by id.
   *
   * @param int $league_id
   *   The league id.
   *
   * @return \TheSportsDb\Entity\LeagueInterface
   */
  public function getLeague($league_id) {
    // Do we have leagues in cache?
    $cache = $this->cache->getItem('leagues');
    if ($cache->isHit()) {
      $leagues = $cache->get();
      if (isset($leagues[$league_id])) {
        return $leagues[$league_id];
      }
    }
    return  $this->leagueFactory->create((object) array('idLeague' => $league_id));
  }

  protected function doLeaguesRequest() {
    $leagues_data = $this->sportsDbClient->doRequest('all_leagues.php');
    $leagues = array();
    $sports = array();
    foreach ($leagues_data->leagues as $league) {
      if (!isset($leagues[$league->idLeague])) {
        $leagues[$league->idLeague] = $this->leagueFactory->create($league);
      }
      if (!isset($sports[$league->strSport])) {
        $sports[$league->strSport] = $this->sportFactory->create($league);
      }
      $sports[$league->strSport]->addLeague($leagues[$league->idLeague]);
    }
    $leagues_cache = new CacheItem('leagues');
    $leagues_cache->set($leagues);
    $this->cache->save($leagues_cache);
    $sports_cache = new CacheItem('sports');
    $sports_cache->set($sports);
    $this->cache->save($sports_cache);
  }
}
