<?php
// Configure error reporting
error_reporting(0);

// Configure session
ini_set('session.cookie_httponly', 1);
session_cache_limiter(false);
session_start();

// Autoload
require ROOT . '/vendor/autoload.php';

// Configure Slim
$app = new \Slim\App([
  'debug' => false
]);

$container = $app->getContainer();
$container['logger'] = function($c) {
  $logger = new \Monolog\Logger('my_logger');
  $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
  $logger->pushHandler($file_handler);
  return $logger;
};

// Configure routes
require ROOT . '/app/routes.php';

// Run
$app->run();