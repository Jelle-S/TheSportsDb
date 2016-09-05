<?php
include_once __DIR__.'/../vendor/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("TheSportsDb\\Test\\", __DIR__ . DIRECTORY_SEPARATOR . 'src');
$classLoader->register();
