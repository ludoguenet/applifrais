<?php
session_start();

require '../vendor/autoload.php';

use App\Router;

/**
 * Définition des constantes globales.
 */
define('PATH_VIEW', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('ROUTES_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR);

/**
 * Instanciation du Routeur.
 */
$router = new Router();

// Fichier de définition des routes
require ROUTES_PATH . 'web.php';

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);