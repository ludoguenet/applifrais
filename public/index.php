<?php

require '../vendor/autoload.php';

use App\Router;
use App\Auth\HomeController;

/**
 * Instanciation du Routeur.
 */
$router = new Router();

/**
 * Définition des routes.
 */

/**
 * Homepage
 */
$router->register('/', [App\Controllers\HomeController::class, 'index']);

/**
 * Authentication
 */
$router->register('/login', function () {
    echo 'login';
});

echo $router->resolve($_SERVER['REQUEST_URI']);