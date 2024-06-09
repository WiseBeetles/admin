<?php

use App\Controllers\Auth\Auth;
use App\Controllers\Site\HomeController;
use Framework\Router;

$router = new Router();

/**
 * Home page
 */
$router->add('/', [HomeController::class, 'show'], 'get');

/**
 * Auth views
 */
$router->add('/login', [Auth::class, 'showLogin'], 'get');
$router->add('/register', [Auth::class, 'showRegister'], 'get');
$router->add('/password', [Auth::class, 'showPassword'], 'get');

/**
 *
 */

return $router;
