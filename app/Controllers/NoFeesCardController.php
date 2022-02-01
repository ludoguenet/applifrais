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
            $target_dir = WEBROOT . "/storage/justificatifs/";
            $fileName = basename($_FILES["justificatif"]["name"]);
            $target_file = $target_dir . $fileName;
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // var_dump($target_dir, $target_file, $imageFileType); die();
            move_uploaded_file($_FILES["justificatif"]["tmp_name"], $target_file);
        }

        $noFeesLineModel->add([
            'idVisiteur' => $userID,
            'mois' => $yearAndMonth,
            'libelle' => $_POST['libelle'],
            'date' => $_POST['date'],
            'montant' => $_POST['montant'],
            'chemin_justificatif' => $target_file ?? NULL,
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