<?php

require "Classes/Factory.php";
require "Classes/FactoryCommand.php";
require "Classes/Application.php";
require "Classes/ConsoleApplication.php";

$config = require __DIR__ . DIRECTORY_SEPARATOR . 'config.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

new ClassAutoloader();

use app\ConsoleApplication;

$app = new ConsoleApplication($config);
$app->run();