<?php
if (!defined('THESPORTSDB_API_KEY')) {
  define('THESPORTSDB_API_KEY', '1');
}
if (
  class_exists('\Symfony\Component\DependencyInjection\ContainerBuilder')
  && class_exists('\Symfony\Component\Config\Resource\FileResource')
  && class_exists('\HendrichA\TagPassLibrary\TagPass')
) {
  // Use the dependency injection container if available.
  include_once __DIR__ . '/default_bootstrap_dic.php';
  return;
}

// Http client.
$httpClient = new GuzzleHttp\Client();

// Factory container.
$factoryContainer = new TheSportsDb\Factory\FactoryContainer();

// Property mapper.
$propertyMapper = new FastNorth\PropertyMapper\Mapper();

// The sports db client.
$sportsDbClient = new TheSportsDb\Http\TheSportsDbClient(THESPORTSDB_API_KEY, $httpClient);

// Cache pool.
$cachePool = new Cache\Adapter\PHPArray\ArrayCachePool();

// League factory.
$leagueFactory = new \TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\League', 'TheSportsDb\Entity\Proxy\LeagueProxy', $factoryContainer, $propertyMapper);

// Sport factory.
$sportFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Sport', 'TheSportsDb\Entity\Proxy\SportProxy', $factoryContainer, $propertyMapper);

// Team factory.
$teamFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Team', 'TheSportsDb\Entity\Proxy\TeamProxy', $factoryContainer, $propertyMapper);

// Event factory.
$eventFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Event', 'TheSportsDb\Entity\Proxy\EventProxy', $factoryContainer, $propertyMapper);

// Player factory.
$playerFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Player', 'TheSportsDb\Entity\Proxy\PlayerProxy', $factoryContainer, $propertyMapper);

// Season factory.
$seasonFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Season', 'TheSportsDb\Entity\Proxy\SeasonProxy', $factoryContainer, $propertyMapper);

// Create the Query objects.
$sportQuery = new TheSportsDb\Query\SportQuery($sportFactory, $sportsDbClient);
$leagueQuery = new TheSportsDb\Query\LeagueQuery($leagueFactory, $sportsDbClient);

$db = new TheSportsDb\TheSportsDb($sportQuery, $leagueQuery);
