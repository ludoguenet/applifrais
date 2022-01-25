<?php

namespace Models;

class FeesCard extends Model
{
    protected string $table = 'fichefrais';

    public function addDefault($userId, $yearAndMonth)
    {
        // Création d'une fiche frais par défaut.
        $query = "INSERT INTO {$this->table}(idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat)
        VALUES(:idVisiteur, :mois, :nbJustificatifs, :montantValide, :dateModif, :idEtat)";

        $statement = $this->getDB()->prepare($query);
        
        $statement->execute([
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
            $query = "INSERT INTO lignefraisforfait(idVisiteur, mois, idFraisForfait, quantite)
            VALUES(:idVisiteur, :mois, :idFraisForfait, :quantite)";
    
            $statement = $this->getDB()->prepare($query);
            
            $statement->execute([
                'idVisiteur' => $userId,
                'mois' => $yearAndMonth,
                'idFraisForfait' => $idFraisForfait,
                'quantite' => 0
            ]);
        }

    }
}