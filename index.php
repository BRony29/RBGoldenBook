<?php

define('ROOT', str_replace('\\', '/', dirname(__DIR__)));

use RBGoldenBook\Autoloader;
use RBGoldenBook\Core\Main;

require_once 'Autoloader.php';
Autoloader::register();
$app = new Main();
$app->start();