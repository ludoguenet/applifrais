<?php

/**
 * Définition des routes.
 */

/**
 * Homepage
 */
$router->get('/', [App\Controllers\HomeController::class, 'index']);

/**
 * Authentication
 */
$router->get('/login', [App\Controllers\Auth\AuthController::class, 'login']);
$router->post('/login', [App\Controllers\Auth\AuthController::class, 'authenticate']);

/**
 * Fiches de frais
 */
$router->get('/fiches-de-frais', [App\Controllers\FeesCardController::class, 'index']);
$router->post('/fiches-de-frais', [App\Controllers\FeesCardController::class, 'store']);
$router->post('/fiches-de-frais/create', [App\Controllers\FeesCardController::class, 'create']);