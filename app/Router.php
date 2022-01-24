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
    public function register(string $route, array $action, string $verb): void
    {
        $this->routes[$verb][$route] = $action;
    }

    public function get(string $route, array $action): void
    {
        $this->register($route, $action, 'GET');
    }

    public function post(string $route, array $action): void
    {
        $this->register($route, $action, 'POST');
    }

    /**
     * Résout la route avec le tableau d'actions donné.
     *
     * @param string $requestUri
     * @return ?
     */
    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$requestMethod][$route] ?? null;
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