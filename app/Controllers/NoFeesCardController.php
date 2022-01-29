<?php

namespace App\Controllers;

use Helpers\Auth;
use Models\NoFeesLineCard;

class NoFeesCardController extends Controller
{
    /**
     * Ajoute une ligne hors forfait et redirige vers la page de création d'une fiche.
     *
     * @return void
     */
    public function store(): void
    {
        $noFeesLineModel = new NoFeesLineCard();

        $yearAndMonth = date('Y') . date('m');
        $userID = Auth::id();

        $noFeesLineModel->add([
            'idVisiteur' => $userID,
            'mois' => $yearAndMonth,
            'libelle' => $_POST['libelle'],
            'date' => $_POST['date'],
            'montant' => $_POST['montant']
        ]);

        $this->redirect('/fiches-de-frais/create');
    }

    /**
     * Supprime une ligne hors forfait et redirige vers la page de création d'une fiche.
     *
     * @return void
     */
    public function delete(): void
    {
        $noFeesLineModel = new NoFeesLineCard();
        $noFeesLineModel->delete($_GET['id']);

        $this->redirect('/fiches-de-frais/create');
    }
}