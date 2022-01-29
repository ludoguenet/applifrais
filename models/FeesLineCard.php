<?php

namespace Models;

class FeesLineCard extends Model
{
    protected string $table = 'lignefraisforfait';

    /**
     * Renvoie les données des lignes de frais forfaits avec le calcul de la table "fraisforfait".
     *
     * @param [type] $userID
     * @param [type] $yearAndMonth
     * @return array
     */
    public function withCalculate(string $userID, string $yearAndMonth): array
    {
        $statement = $this->getDB()->prepare("
            SELECT *, (fraisforfait.montant * {$this->table}.quantite) AS total_count
            FROM {$this->table}
            INNER JOIN fraisforfait
            ON {$this->table}.idFraisForfait = fraisforfait.id
            WHERE {$this->table}.idVisiteur = :idVisiteur
            AND {$this->table}.mois = :mois
        ");

        $statement->execute([
            'idVisiteur' => $userID,
            'mois' => $yearAndMonth
        ]);

        return $statement->fetchAll();
    }

    /**
     * Met à jour les quantités envoyé par l'utilisateur.
     *
     * @param [type] $userID
     * @param [type] $yearAndMonth
     * @param [type] $idFraisForfait
     * @param [type] $quantity
     * @return void
     */
    public function updateQuantity($userID, $yearAndMonth, $idFraisForfait, $quantity): void
    {
        $statement = $this->getDB()->prepare("
            UPDATE {$this->table} SET quantite = :quantity
            WHERE idVisiteur = :userID
            AND mois = :yearAndMonth
            AND idFraisForfait = :idFraisForfait
        ");

        $statement->execute([
            'quantity' => $quantity,
            'userID' => $userID,
            'yearAndMonth' => $yearAndMonth,
            'idFraisForfait' => $idFraisForfait
        ]);
    }
}