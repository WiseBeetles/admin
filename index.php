<?php
/**
 * Require project config
 */
require_once "config/config.php";

/**
 * Require autoload
 */
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Framework\Dotenv;
$dotenv->load(__DIR__ . "/.env");

set_error_handler("Framework\ErrorHandler::handleError");
set_exception_handler("Framework\ErrorHandler::handleException");

/**
 * Site routes
 */
$router = require_once __DIR__ . '/routes/web.php';

/**
 * Services container
 */
$container = require_once __DIR__ . '/config/services.php';

/**
 * Dispatcher
 */
$dispatcher = new Framework\Dispatcher($router, $container);

/**
 * Request
 */
$request = Framework\Request::createFromGlobals();

/**
 * Response
 */
$response = $dispatcher->handle($request);

$response->send();
