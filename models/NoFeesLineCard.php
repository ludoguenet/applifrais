<?php

namespace Models;

class NofeesLineCard extends Model
{
    protected string $table = 'lignefraishorsforfait';
    
    /**
     * Ajoute une nouvelle ligne de frais hors forfait.
     *
     * @param [type] $yearAndMonth
     * @param [type] $userId
     * @param [type] $label
     * @param [type] $date
     * @param [type] $amount
     * @return void
     */
    public function addNew($yearAndMonth, $userId, $label, $date, $amount): void
    {
        $this->add([
            'idVisiteur' => $userId,
            'mois' => $yearAndMonth,
            'libelle' => $label,
            'date' => $date,
            'montant' => $amount
        ]);
    }
}