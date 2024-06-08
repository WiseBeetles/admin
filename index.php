<?php
/**
 * Require project config
 */
require_once "config/config.php";

/**
 * Require autoload
 */
require __DIR__ . '/vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];
$viewDir = VIEWS_PATH;

switch ($request) {
    case '':
    case '/':
        require_once __DIR__ . $viewDir . 'home.php';
        break;

    case '/admin':
        require_once __DIR__ . $viewDir . 'admin.php';
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . $viewDir . '404.php';
}
