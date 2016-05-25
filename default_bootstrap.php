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

// Property mapper container.
$propertyMapperContainer = new TheSportsDb\PropertyMapper\PropertyMapperContainer();

// The sports db client.
$sportsDbClient = new TheSportsDb\Http\TheSportsDbClient(THESPORTSDB_API_KEY, $httpClient);

// Cache pool.
$cachePool = new Cache\Adapter\PHPArray\ArrayCachePool();

// League property mapper.
$leaguePropertyMapper = new TheSportsDb\PropertyMapper\LeaguePropertyMapper();

// League factory.
$leagueFactory = new \TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\League', 'TheSportsDb\Entity\Proxy\LeagueProxy');
$leagueFactory->setPropertyMapperContainer($propertyMapperContainer);

// Sport property mapper.
$sportPropertyMapper = new TheSportsDb\PropertyMapper\SportPropertyMapper();
$sportPropertyMapper->setLeagueFactory($leagueFactory);

// Sport factory.
$sportFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Sport', 'TheSportsDb\Entity\Proxy\SportProxy');
$sportFactory->setPropertyMapperContainer($propertyMapperContainer);

// Team property mapper.
$teamPropertyMapper = new TheSportsDb\PropertyMapper\TeamPropertyMapper();
$teamPropertyMapper->setLeagueFactory($leagueFactory);
$teamPropertyMapper->setSportFactory($sportFactory);

// Team factory.
$teamFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Team', 'TheSportsDb\Entity\Proxy\TeamProxy');
$teamFactory->setPropertyMapperContainer($propertyMapperContainer);

// Event property mapper.
$eventPropertyMapper = new TheSportsDb\PropertyMapper\EventPropertyMapper();
$eventPropertyMapper->setLeagueFactory($leagueFactory);
$eventPropertyMapper->setTeamFactory($teamFactory);

// Event factory.
$eventFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Event', 'TheSportsDb\Entity\Proxy\EventProxy');
$eventFactory->setPropertyMapperContainer($propertyMapperContainer);

// Player property mapper.
$playerPropertyMapper = new TheSportsDb\PropertyMapper\PlayerPropertyMapper();
$playerPropertyMapper->setSportFactory($sportFactory);
$playerPropertyMapper->setTeamFactory($teamFactory);

// Player factory.
$playerFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Player', 'TheSportsDb\Entity\Proxy\PlayerProxy');
$playerFactory->setPropertyMapperContainer($propertyMapperContainer);

// Season property mapper.
$seasonPropertyMapper = new TheSportsDb\PropertyMapper\SeasonPropertyMapper();
$seasonPropertyMapper->setLeagueFactory($leagueFactory);
$seasonPropertyMapper->setEventFactory($eventFactory);

// Season factory.
$seasonFactory = new TheSportsDb\Factory\Factory($sportsDbClient, 'TheSportsDb\Entity\Season', 'TheSportsDb\Entity\Proxy\SeasonProxy');
$seasonFactory->setPropertyMapperContainer($propertyMapperContainer);

// Set the season facotry for the league and event property mappers.
$leaguePropertyMapper->setSeasonFactory($seasonFactory);
$eventPropertyMapper->setSeasonFactory($seasonFactory);

// Add property mappers to the container.
$propertyMapperContainer->addPropertyMapper($leaguePropertyMapper);
$propertyMapperContainer->addPropertyMapper($sportPropertyMapper);
$propertyMapperContainer->addPropertyMapper($teamPropertyMapper);
$propertyMapperContainer->addPropertyMapper($eventPropertyMapper);
$propertyMapperContainer->addPropertyMapper($playerPropertyMapper);
$propertyMapperContainer->addPropertyMapper($seasonPropertyMapper);

// Create the Query objects.
$sportQuery = new TheSportsDb\Query\SportQuery($sportFactory, $sportsDbClient);
$leagueQuery = new TheSportsDb\Query\LeagueQuery($leagueFactory, $sportsDbClient);

$db = new TheSportsDb\TheSportsDb($sportQuery, $leagueQuery);
