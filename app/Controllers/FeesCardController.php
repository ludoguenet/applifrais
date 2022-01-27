<?php

namespace App\Controllers;

use App\View;
use Helpers\Auth;
use Helpers\FeesCard;
use Models\FeesLineCard;
use Models\NoFeesLineCard;

class FeesCardController extends Controller
{
    /**
     * Afficher les fiches de frais
     *
     */
    public function index(): View
    {
        if (!Auth::check()) $this->redirect('login');

        return View::make('fees_cards/index');
    }

    /**
     * Formulaire pour modifier / ajouter des frais sur sa fiche.
     * Création automatique d'une fiche de frais elle n'existe pas.
     *
     * @return View
     */
    public function create(): View
    {
        // Vérifier si une fiche de frais existe sinon lui créer.
        $currentMonthFeesCard = FeesCard::currentMonth();

        if (!$currentMonthFeesCard) {
            $userID = Auth::id();
            $yearAndMonth = date('Y') . date('m');

            $currentMonthFeesCard = FeesCard::createDefault($userID, $yearAndMonth);
        }

        $feesLineCards = (new FeesLineCard())->where(
            ['idVisiteur', 'mois'],
            [ $currentMonthFeesCard['idVisiteur'], $currentMonthFeesCard['mois'] ],
            true
        );

        $noFeesLineCards = (new NoFeesLineCard())->where(
            ['idVisiteur', 'mois'],
            [ $currentMonthFeesCard['idVisiteur'], $currentMonthFeesCard['mois'] ],
            true
        );
        
        return View::make('fees_cards/create', compact('currentMonthFeesCard', 'feesLineCards', 'noFeesLineCards'));
    }

    /**
     * Met à jour les frais avec les informations envoyées puis redirige sur la même page.
     *
     * @return void
     */
    public function update(): void
    {
        $feesLineModel = new FeesLineCard();

        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        foreach ($_POST as $idFraisForfait => $quantity) {
            $feesLineModel->updateQuantity($userId, $yearAndMonth, $idFraisForfait, $quantity);
        }

        $this->redirect('/fiches-de-frais/create');
    }
}