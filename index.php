<?php
/**
 * Require project config
 */
require_once "config/config.php";

/**
 * Require autoload
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Site routes
 */
$router = require_once __DIR__ . '/routes/web.php';

/**
 * Services container
 */
$container = require_once __DIR__ . '/config/services.php';

$dispatcher = new Framework\Dispatcher($router, $container);

$request = Framework\Request::createFromGlobals();

$response = $dispatcher->handle($request);

$response->send();