<?php

use App\Controllers\Site\HomeController;
use Framework\Router;

$router = new Router();

$router->add('/', [HomeController::class, 'show'], 'get');

return $router;
