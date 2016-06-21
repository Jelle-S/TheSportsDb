<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use HendrichA\TagPassLibrary\TagPass;

$container = new ContainerBuilder();
// API key.
$container->setParameter('thesportsdb.api_key', THESPORTSDB_API_KEY);

// Entity classes.
$container->setParameter('thesportsdb.entity.class.league', 'TheSportsDb\Entity\League');
$container->setParameter('thesportsdb.entity.proxy.league', 'TheSportsDb\Entity\Proxy\LeagueProxy');
$container->setParameter('thesportsdb.entity.class.sport', 'TheSportsDb\Entity\Sport');
$container->setParameter('thesportsdb.entity.proxy.sport', 'TheSportsDb\Entity\Proxy\SportProxy');
$container->setParameter('thesportsdb.entity.class.team', 'TheSportsDb\Entity\Team');
$container->setParameter('thesportsdb.entity.proxy.team', 'TheSportsDb\Entity\Proxy\TeamProxy');
$container->setParameter('thesportsdb.entity.class.event', 'TheSportsDb\Entity\Event');
$container->setParameter('thesportsdb.entity.proxy.event', 'TheSportsDb\Entity\Proxy\EventProxy');
$container->setParameter('thesportsdb.entity.class.player', 'TheSportsDb\Entity\Player');
$container->setParameter('thesportsdb.entity.proxy.player', 'TheSportsDb\Entity\Proxy\PlayerProxy');
$container->setParameter('thesportsdb.entity.class.season', 'TheSportsDb\Entity\Season');
$container->setParameter('thesportsdb.entity.proxy.season', 'TheSportsDb\Entity\Proxy\SeasonProxy');

// Http client.
$container->register('thesportsdb.client.http', 'GuzzleHttp\Client');

// Property mapper container.
$container->register('thesportsdb.propertymapper.container', 'TheSportsDb\PropertyMapper\PropertyMapperContainer');

// Sports db client.
$container->register('thesportsdb.client.thesportsdb', 'TheSportsDb\Http\TheSportsDbClient')
    ->addArgument('%thesportsdb.api_key%')
    ->addArgument(new Reference('thesportsdb.client.http'));

// Cache pool.
$container->register('thesportsdb.cache', 'Cache\Adapter\PHPArray\ArrayCachePool');

// League property mapper.
$container->register('thesportsdb.propertymapper.league', 'TheSportsDb\PropertyMapper\LeaguePropertyMapper')
    ->addMethodCall('setSeasonFactory', array(new Reference('thesportsdb.factory.season')))
    ->addTag('property_mapper');

// League factory.
$container->register('thesportsdb.factory.league', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.league%')
    ->addArgument('%thesportsdb.entity.proxy.league%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Sport property mapper.
$container->register('thesportsdb.propertymapper.sport', 'TheSportsDb\PropertyMapper\SportPropertyMapper')
    ->addMethodCall('setLeagueFactory', array(new Reference('thesportsdb.factory.league')))
    ->addTag('property_mapper');

// Sport factory.
$container->register('thesportsdb.factory.sport', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.sport%')
    ->addArgument('%thesportsdb.entity.proxy.sport%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Team property mapper.
$container->register('thesportsdb.propertymapper.team', 'TheSportsDb\PropertyMapper\TeamPropertyMapper')
    ->addMethodCall('setLeagueFactory', array(new Reference('thesportsdb.factory.league')))
    ->addMethodCall('setSportFactory', array(new Reference('thesportsdb.factory.sport')))
    ->addTag('property_mapper');

// Team factory.
$container->register('thesportsdb.factory.team', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.team%')
    ->addArgument('%thesportsdb.entity.proxy.team%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Event property mapper.
$container->register('thesportsdb.propertymapper.event', 'TheSportsDb\PropertyMapper\EventPropertyMapper')
    ->addMethodCall('setLeagueFactory', array(new Reference('thesportsdb.factory.league')))
    ->addMethodCall('setTeamFactory', array(new Reference('thesportsdb.factory.team')))
    ->addMethodCall('setSeasonFactory', array(new Reference('thesportsdb.factory.season')))
    ->addTag('property_mapper');

// Event factory.
$container->register('thesportsdb.factory.event', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.event%')
    ->addArgument('%thesportsdb.entity.proxy.event%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Player property mapper.
$container->register('thesportsdb.propertymapper.player', 'TheSportsDb\PropertyMapper\PlayerPropertyMapper')
    ->addMethodCall('setTeamFactory', array(new Reference('thesportsdb.factory.team')))
    ->addMethodCall('setSportFactory', array(new Reference('thesportsdb.factory.sport')))
    ->addTag('property_mapper');

// Player factory.
$container->register('thesportsdb.factory.player', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.player%')
    ->addArgument('%thesportsdb.entity.proxy.player%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Season property mapper.
$container->register('thesportsdb.propertymapper.season', 'TheSportsDb\PropertyMapper\SeasonPropertyMapper')
    ->addMethodCall('setLeagueFactory', array(new Reference('thesportsdb.factory.league')))
    ->addMethodCall('setEventFactory', array(new Reference('thesportsdb.factory.event')))
    ->addTag('property_mapper');

// Season factory.
$container->register('thesportsdb.factory.season', 'TheSportsDb\Entity\Factory\Factory')
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'))
    ->addArgument('%thesportsdb.entity.class.season%')
    ->addArgument('%thesportsdb.entity.proxy.season%')
    ->addMethodCall('setPropertyMapperContainer', array(new Reference('thesportsdb.propertymapper.container')));

// Create the Query objects.
$container->register('thesportsdb.query.sport', 'TheSportsDb\Query\SportQuery')
    ->addArgument(new Reference('thesportsdb.factory.sport'))
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'));
$container->register('thesportsdb.query.league', 'TheSportsDb\Query\LeagueQuery')
    ->addArgument(new Reference('thesportsdb.factory.league'))
    ->addArgument(new Reference('thesportsdb.client.thesportsdb'));

// Create the main sportsdb object.
$container->register('thesportsdb', 'TheSportsDb\TheSportsDb')
    ->addArgument(new Reference('thesportsdb.query.sport'))
    ->addArgument(new Reference('thesportsdb.query.league'));

// Compiler pass.
$tagpass = new TagPass('property_mapper');
$tagpass->addServiceIdsTo('thesportsdb.propertymapper.container', 'addPropertyMapper');
$container->addCompilerPass($tagpass);
$container->compile();

$db = $container->get('thesportsdb');
