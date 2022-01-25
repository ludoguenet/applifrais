<?php

namespace Helpers;

use Models\FeesCard as ModelsFeesCard;

class FeesCard
{
    public static function currentMonth()
    {
        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        return (new ModelsFeesCard())->where(['idVisiteur', 'mois'], [$userId, $yearAndMonth]);
    }

    public static function createDefault()
    {
        $yearAndMonth = date('Y') . date('m');
        $userId = Auth::id();

        (new ModelsFeesCard())->addDefault($userId, $yearAndMonth);
    }
}