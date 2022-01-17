<?php

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
$router->register('/login', [App\Controllers\Auth\AuthController::class, 'login']);