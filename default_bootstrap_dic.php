<?php
use HendrichA\TagPassLibrary\TargetedTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config'));
$loader->load('config.yml');

// Compiler pass.
$repositoryTagpass = new TargetedTagPass('entity_repository', 'addRepository');
$container->addCompilerPass($repositoryTagpass);
$entityManagerTagpass = new TargetedTagPass('entity_manager', 'setEntityManager');
$container->addCompilerPass($entityManagerTagpass);
$container->compile();
$db = $container->get('thesportsdb');
