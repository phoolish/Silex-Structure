<?php
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

$app = require_once __DIR__.'/../Library/src/Bootstrap.php';

$app->run();

$bm[0] = round(microtime(true) - FUEL_START_TIME, 4);
$bm[1] = round((memory_get_peak_usage() - FUEL_START_MEM)/1048576, 3);
echo sprintf('<!-- Time: %s, Memory: %s -->', $bm[0], $bm[1]);
