<?php

namespace App\Helpers;

class DateHelper
{
    private const MONTHS_NAME = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Août',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre'
    ];

    public static function formatMonth(string $feesCardMonth): string
    {
        return self::MONTHS_NAME[mb_substr($feesCardMonth, 4, 2)] . ' ' . mb_substr($feesCardMonth, 0, 4); 
    }
}