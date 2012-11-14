<?php

require_once __DIR__.'/Controller.php';
$app->mount('/account', $account);

$app['twig.loader.filesystem']->addPath(__DIR__.'/Views', 'Account');
