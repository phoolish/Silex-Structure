<?php

/*
 * Core stuff
 */
require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();

/*
 * Debug Setup
 */
$app['debug'] = true;

/*
 * Session Setup
 */
$app->register(new Silex\Provider\SessionServiceProvider());

$app['session.db_options'] = array(
    'db_table'      => 'session',
    'db_id_col'     => 'session_id',
    'db_data_col'   => 'session_value',
    'db_time_col'   => 'session_time',
);

$app['session.storage.handler'] = $app->share(function () use ($app) {
    return new Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler(
        $app['db']->getWrappedConnection(),
        $app['session.db_options'],
        $app['session.storage.options']
    );
});

/*
 * Twig Setup
 */
$app->register(new Silex\Provider\TwigServiceProvider());

/*
 * Url Generator Setup
 */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/*
 * Database Setup
 */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => '',
        'host'     => '127.0.0.1',
        'user'     => '',
        'password' => '',
    ),
));

/*
 * Module Setup
 */
require_once __DIR__.'/Modules/Root/Config.php';
require_once __DIR__.'/Modules/Account/Config.php';

/*
 * Core stuff
 */
return $app;
