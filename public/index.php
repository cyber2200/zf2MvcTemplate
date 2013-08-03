<?php
chdir(dirname(__DIR__));
require('init_autoloader.php');
$config = require('config/application.config.php');
Zend\Mvc\Application::init($config)->run();