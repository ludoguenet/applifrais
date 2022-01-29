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
$router->get('/logout', [App\Controllers\Auth\AuthController::class, 'logout']);
$router->post('/login', [App\Controllers\Auth\AuthController::class, 'authenticate']);

/**
 * Fiches de frais
 */
$router->get('/fiches-de-frais', [App\Controllers\FeesCardController::class, 'index']);
$router->post('/fiches-de-frais', [App\Controllers\FeesCardController::class, 'show']);
$router->post('/fiches-de-frais/update', [App\Controllers\FeesCardController::class, 'update']);
$router->get('/fiches-de-frais/create', [App\Controllers\FeesCardController::class, 'create']);

/**
 * Lignes hors forfaits
 */
$router->post('/hors-forfait/store', [App\Controllers\NoFeesCardController::class, 'store']);
$router->get('/hors-forfait/delete', [App\Controllers\NoFeesCardController::class, 'delete']);