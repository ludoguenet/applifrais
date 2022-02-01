<?php
session_start();

require '../vendor/autoload.php';

/**
 * Définition des constantes globales.
 */
define('PATH_VIEW', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('ROUTES_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__DIR__));

/**
 * Instanciation du Routeur.
 */
$router = new App\Router();

// Fichier de définition des routes
require ROUTES_PATH . 'web.php';

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);