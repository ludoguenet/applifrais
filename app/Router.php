<?php

namespace App;

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
    public function register(string $route, callable|array $action): void
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

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();
    
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}