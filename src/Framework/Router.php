<?php

namespace Framework;

class Router
{
    private array $routes;

    /**
     * @param array $route
     */
    public function add(array $route): void
    {
        $this->routes[] = $route;
    }

}
