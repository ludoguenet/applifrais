<?php

require '../vendor/autoload.php';

use App\Router;
use App\Auth\HomeController;

/**
 * Définition des constantes globales.
 */
define('PATH_VIEW', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

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
// $router->register('/login', function () {
//     echo 'login';
// });

echo $router->resolve($_SERVER['REQUEST_URI']);