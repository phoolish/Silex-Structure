<?php

use Symfony\Component\Stopwatch\Stopwatch;
use Project\Resources\Application;

require_once __DIR__.'/../vendor/autoload.php';

$stopwatch = new Stopwatch();
$stopwatch->start('bench');

$app = new Application();
$app->run();

$stopwatch = $stopwatch->stop('bench');
echo sprintf("<!--Time: %s Seconds, Memory: %s Megabyte(s)-->", $stopwatch->getDuration() / 1000, ($stopwatch->getMemory() / 1024) / 1024 );
