<?php

namespace App\Controllers;

use App\View;
use Helpers\Auth\Auth;

class FeesCardController extends Controller
{
    /**
     * Afficher les fiches de frais
     *
     * @return void
     */
    public function index()
    {
        if (!Auth::check()) $this->redirect('login');

        // Récupèrer les fiches frais de l'utilisateur connecté;

        return View::make('fees_cards/index');
    }

    /**
     * Ajouter une fiche de frais
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Enreigstre une nouvelle fiche de frais
     *
     * @return void
     */
    public function store()
    {

    }
}