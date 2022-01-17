<?php

namespace App;

use Exception;

class Router
{
    private array $routes = [];

    /**
     * Enregistre une route avec son action.
     *
     * @param string $route
     * @param callable $action
     * @return void
     */
    public function register(string $route, array $action): void
    {
        $this->routes[$route] = $action;
    }

    /**
     * Résout la route avec le tableau d'actions donné.
     *
     * @param string $requestUri
     * @return ?
     */
    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$route] ?? null;
        [$class, $method] = $action;

        if (is_array($action)) {
            if (class_exists($class) && method_exists($class, $method)) {
                $class = new $class();
                return call_user_func_array([$class, $method], []);
            }
        }

        throw new Exception('Route Not Found');
    }
}