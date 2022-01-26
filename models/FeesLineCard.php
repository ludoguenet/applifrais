<?php

namespace Models;

class FeesLineCard extends Model
{
    protected string $table = 'lignefraisforfait';

    public function updateQuantity($userID, $yearAndMonth, $idFraisForfait, $quantity) {
        $query = $this->getDB()->prepare("
            UPDATE {$this->table} SET quantite = :quantity
            WHERE idVisiteur = :userID
            AND mois = :yearAndMonth
            AND idFraisForfait = :idFraisForfait
        ");

        $query->execute([
            'quantity' => $quantity,
            'userID' => $userID,
            'yearAndMonth' => $yearAndMonth,
            'idFraisForfait' => $idFraisForfait
        ]);
    }
}