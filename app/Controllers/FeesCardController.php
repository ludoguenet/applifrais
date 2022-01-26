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
     * Ajouter une fiche de frais
     *
     * @return void
     */
    public function create()
    {
        // Vérifier si une fiche de frais existe sinon lui créer.
        $currentMonthFeesCard = FeesCard::currentMonth();

        if (!$currentMonthFeesCard) {
            $currentMonthFeesCard = FeesCard::createDefault();
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
     * MAJ
     *
     * @return void
     */
    public function update()
    {
        $feesLineModel = new FeesLineCard();

        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        foreach ($_POST as $idFraisForfait => $quantity) {
            $feesLineModel->updateQuantity($userId, $yearAndMonth, $idFraisForfait, $quantity);
        }

        return $this->redirect('/fiches-de-frais/create');
    }
}