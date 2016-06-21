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
$factoryContainer = new TheSportsDb\Entity\Factory\FactoryContainer();

// Repository container.
$repositoryContainer = new TheSportsDb\Entity\Repository\RepositoryContainer();

// Property mapper.
$propertyMapper = new FastNorth\PropertyMapper\Mapper();

// Entity manager.
$entityManager = new TheSportsDb\Entity\EntityManager($factoryContainer, $repositoryContainer, $propertyMapper);
$entityManager->registerClass('league');
$entityManager->registerClass('sport');
$entityManager->registerClass('team');
$entityManager->registerClass('event');
$entityManager->registerClass('player');
$entityManager->registerClass('season');

// Repositories.
$repositoryContainer->addRepository(new TheSportsDb\Entity\Repository\SportRepository($entityManager));
$repositoryContainer->addRepository(new TheSportsDb\Entity\Repository\LeagueRepository($entityManager));
$repositoryContainer->addRepository(new TheSportsDb\Entity\Repository\SeasonRepository($entityManager));
$repositoryContainer->addRepository(new TheSportsDb\Entity\Repository\EventRepository($entityManager));

// Cache pool.
$cachePool = new Cache\Adapter\PHPArray\ArrayCachePool();

// The sports db client.
$sportsDbClient = new TheSportsDb\Http\TheSportsDbClient(THESPORTSDB_API_KEY, $httpClient);

// Factory.
$factory = new \TheSportsDb\Entity\Factory\Factory($sportsDbClient, $entityManager);

$factoryContainer->setDefaultFactory($factory);

$db = new TheSportsDb\TheSportsDb($entityManager);
