<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    /**
     * Page d'accueil.
     *
     * @return View
     */
    public function index(): View
    {
        return View::make('index');
    }
}