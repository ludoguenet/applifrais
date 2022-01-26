<?php

namespace App\Controllers;

use Helpers\Auth;
use Models\NoFeesLineCard;

class NoFeesCardController extends Controller
{
    /**
     * Ajoute une ligne hors forfait
     *
     * @return void
     */
    public function store()
    {
        $noFeesLineModel = new NoFeesLineCard();

        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        $noFeesLineModel->add([
            'idVisiteur' => $userId,
            'mois' => $yearAndMonth,
            'libelle' => $_POST['libelle'],
            'date' => $_POST['date'],
            'montant' => $_POST['montant']
        ]);

        return $this->redirect('/fiches-de-frais/create');
    }

    public function delete()
    {
        $noFeesLineModel = new NoFeesLineCard();
        $noFeesLineModel->delete($_GET['id']);

        return $this->redirect('/fiches-de-frais/create');
    }
}