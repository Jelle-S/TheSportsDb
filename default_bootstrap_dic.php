<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
print "dic\n\n";
$container = new ContainerBuilder();
// API key.
$container->setParameter('thesportsdb.api_key', THESPORTSDB_API_KEY);

// Http client.
$container->register('thesportsdb.client.http', 'GuzzleHttp\Client');

// Factory container.
$factoryContainer = $container->register('thesportsdb.factory.container', 'TheSportsDb\Entity\Factory\FactoryContainer');

// Repository container.
$repositoryContainer = $container->register('thesportsdb.repository.container', 'TheSportsDb\Entity\Repository\RepositoryContainer');

// Property mapper.
$container->register('thesportsdb.property.mapper', 'FastNorth\PropertyMapper\Mapper');

$container->register('thesportsdb.entity.manager', 'TheSportsDb\Entity\EntityManager')
    ->addArgument(new Reference('thesportsdb.factory.container'))
    ->addArgument(new Reference('thesportsdb.repository.container'))
    ->addArgument(new Reference('thesportsdb.property.mapper'))
    ->addMethodCall('registerClass', array('league'))
    ->addMethodCall('registerClass', array('sport'))
    ->addMethodCall('registerClass', array('team'))
    ->addMethodCall('registerClass', array('event'))
    ->addMethodCall('registerClass', array('player'))
    ->addMethodCall('registerClass', array('season'));

// Repositories.
$container->register('thesportsdb.repository.sport', 'TheSportsDb\Entity\Repository\SportRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.sport')));
$container->register('thesportsdb.repository.league', 'TheSportsDb\Entity\Repository\LeagueRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.league')));
$container->register('thesportsdb.repository.season', 'TheSportsDb\Entity\Repository\SeasonRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.season')));
$container->register('thesportsdb.repository.event', 'TheSportsDb\Entity\Repository\EventRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.event')));
$container->register('thesportsdb.repository.player', 'TheSportsDb\Entity\Repository\PlayerRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.player')));
$container->register('thesportsdb.repository.team', 'TheSportsDb\Entity\Repository\TeamRepository')
    ->addArgument(new Reference('thesportsdb.entity.manager'));
$repositoryContainer->addMethodCall('addRepository', array(new Reference('thesportsdb.repository.team')));

// Sports db client.
$container->register('thesportsdb.client.thesportsdb', 'TheSportsDb\Http\TheSportsDbClient')
    ->addArgument('%thesportsdb.api_key%')
    ->addArgument(new Reference('thesportsdb.client.http'));

// Factory.
$container->register('thesportsdb.default.factory', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument(new Reference('thesportsdb.entity.manager'));

// Register the default factory.
$factoryContainer->addMethodCall('setDefaultFactory', array(new Reference('thesportsdb.default.factory')));

// Create the main sportsdb object.
$container->register('thesportsdb', 'TheSportsDb\TheSportsDb')
    ->addArgument(new Reference('thesportsdb.entity.manager'));

$db = $container->get('thesportsdb');
