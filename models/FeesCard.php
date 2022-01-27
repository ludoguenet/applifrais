<?php

namespace Models;

class FeesCard extends Model
{
    protected string $table = 'fichefrais';

    /**
     * Créer une fiche de frais par défaut avec ses lignes de frais forfaitisés.
     *
     * @param string $userId
     * @param string $yearAndMonth
     * @return array
     */
    public function addDefault(string $userId, string $yearAndMonth): array
    {
        // Création d'une fiche frais par défaut.
        $this->add([
            'idVisiteur' => $userId,
            'mois' => $yearAndMonth,
            'nbJustificatifs' => 0,
            'montantValide' => null,
            'dateModif' => date('Y-m-d'),
            'idEtat' => 'CR'
        ]);

        // Création de 4 lignesfraisforfaits par défaut.
        $idFraisForfaits = ['ETP', 'KM', 'NUI', 'REP'];

        foreach ($idFraisForfaits as $idFraisForfait) {
            $feesLineModel = new FeesLineCard();
            $feesLineModel->add([
                'idVisiteur' => $userId,
                'mois' => $yearAndMonth,
                'idFraisForfait' => $idFraisForfait,
                'quantite' => 0
            ]);

        }

        return $this->where(['idVisiteur', 'mois'], [$userId, $yearAndMonth]);
    }
}