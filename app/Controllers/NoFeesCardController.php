<?php

namespace App\Controllers;

use App\Helpers\Auth;
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

        // Enregistrement justificatif si présent
        if (isset($_FILES['justificatif'])) {
            $baseName = uniqid();
            $temporaryPathName = $_FILES['justificatif']['tmp_name'];
            $storageDirectory =
            '/storage'
            . DIRECTORY_SEPARATOR
            . 'justificatifs'
            . DIRECTORY_SEPARATOR;
            
            $fullPathName = $storageDirectory . $baseName;

            move_uploaded_file($temporaryPathName, $fullPathName);
        }

        $noFeesLineModel->add([
            'idVisiteur' => $userID,
            'mois' => $yearAndMonth,
            'libelle' => $_POST['libelle'],
            'date' => $_POST['date'],
            'montant' => $_POST['montant'],
            'chemin_justificatif' => $fullPathName ?? NULL
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