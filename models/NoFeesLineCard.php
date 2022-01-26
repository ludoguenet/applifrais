<?php

namespace Models;

class NofeesLineCard extends Model
{
    protected string $table = 'lignefraishorsforfait';

    // $noFeesLineModel->addNew($yearAndMonth, $userId, $_POST['libelle'], $_POST['date'], $_POST['montant']);
    
    public function addNew($yearAndMonth, $userId, $label, $date, $amount): void
    {
        $query = "INSERT INTO {$this->table}(idVisiteur, mois, libelle, date, montant) VALUES(:idVisiteur, :mois, :libelle, :date, :montant)";

        $statement = $this->getDB()->prepare($query);

        $statement->execute([
            'idVisiteur' => $userId,
            'mois' => $yearAndMonth,
            'libelle' => $label,
            'date' => $date,
            'montant' => $amount
        ]);
    }
}