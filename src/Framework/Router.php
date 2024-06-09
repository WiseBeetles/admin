<?php

namespace Framework;

class Router
{
    private array $routes;

    public function add(string $path, array $params = [], string|null $method = null)
    {
        $routeData = [
            'path' => $path,
            'params' => $params,
        ];

        $routeData['params'] = $method ? array_merge($routeData['params'], ['method' => $method]) : $routeData;

        $this->routes[] = $routeData;
    }

    public function match(string $path, string $method): array|bool
    {
        $path = urldecode($path);

        foreach ($this->routes as $route) {
            $params = $route['params'];

            if ($route['path'] !== $path) {
                continue;
            }

            if (array_key_exists("method", $params)) {
                if (strtolower($method) !== strtolower($params["method"])) {
                    continue;
                }
            }

            return $params;
        }

        return false;
    }
}
