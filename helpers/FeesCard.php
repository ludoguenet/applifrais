<?php

namespace Helpers;

use Models\FeesCard as ModelsFeesCard;

class FeesCard
{
    /**
     * Retourne la fiche de frais du mois actuel pour l'utilisateur. (Ne renvoie rien sinon).
     *
     * @return mixed
     */
    public static function currentMonth(): mixed
    {
        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        return (new ModelsFeesCard())->where(['idVisiteur', 'mois'], [$userId, $yearAndMonth]);
    }

    /**
     * Créer une fiche de frais par défaut pour le mois en cours et génère les frais forfaitsés liés à celle-ci.
     *
     * @param string $userID
     * @param string $yearAndMonth
     * @return array
     */
    public static function createDefault(string $userID, string $yearAndMonth): array
    {
        return (new ModelsFeesCard())->addDefault($userID, $yearAndMonth);
    }
}