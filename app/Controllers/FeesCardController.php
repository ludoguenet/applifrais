<?php

namespace App\Controllers;

use App\View;
use Helpers\Auth;
use Helpers\FeesCard;
use Models\FeesLineCard;
use Models\NoFeesLineCard;
use Models\FeesCard as ModelFeesCard;

class FeesCardController extends Controller
{
    /**
     * Afficher les fiches de frais
     *
     */
    public function index(): View
    {
        if (!Auth::check()) $this->redirect('login');

        // Récupère les éventuelles fiches crées.
        $userID = Auth::id();
        $feesCards = (new ModelFeesCard())->where('idVisiteur', $userID, true);

        return View::make('fees/index', compact('feesCards'));
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
        
        return View::make('fees/create', compact('currentMonthFeesCard', 'feesLineCards', 'noFeesLineCards'));
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
        $userID = Auth::id();

        foreach ($_POST as $idFraisForfait => $quantity) {
            $feesLineModel->updateQuantity($userID, $yearAndMonth, $idFraisForfait, $quantity);
        }

        $this->redirect('/fiches-de-frais/create');
    }

    /**
     * Montre les informations de frais pour le mois choisi par l'utilisateur authentifié.
     *
     * @return View
     */
    public function show(): View
    {
        $userID = Auth::id();
        $feesCards = (new ModelFeesCard())->where('idVisiteur', $userID, true);
        $feesCard = (new ModelFeesCard())->where(['idVisiteur', 'mois'], [ $userID, $_POST['selected_month']]);
        $feesLineCards = (new FeesLineCard())->withCalculate($userID, $_POST['selected_month']);
        $noFeesLineCards = (new NoFeesLineCard())->where(['idVisiteur', 'mois'], [ $userID, $_POST['selected_month']], true);

        return View::make('fees/index', compact('feesCards', 'feesCard', 'feesLineCards', 'noFeesLineCards'));
    }
}