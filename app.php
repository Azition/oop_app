<?php

$config = require __DIR__ . DIRECTORY_SEPARATOR . 'config.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

new ClassAutoloader();

use app\ConsoleApplication;

$app = new ConsoleApplication($config);
$app->run();