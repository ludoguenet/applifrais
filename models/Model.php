<?php

namespace Models;

use Database\PDOConnector;

abstract class Model
{
    /**
     * Récupère des données sur une clause WHERE en passant plusieurs valeurs.
     *
     * @param string|array $column
     * @param string $value
     * @return void
     */
    public function where(string|array $columns, string|array $value)
    {
        $statement = $this->getDB()->prepare("SELECT * FROM {$this->table}");

        if (is_string($columns)) {
            $statement . " WHERE {$columns} = ?";
        } else {
            $query = '';

            foreach($columns as $key => $column) {
                $clause = $key !== 0 ? 'AND' : 'WHERE';
                $query .= "{$clause} {$column} = ? ";
               
            }

            $statement = $this->getDB()->prepare("SELECT * FROM {$this->table} {$query}");
        }

        if (is_string($value)) {
            $statement->execute([$value]);
        } else {
            $statement->execute($value);
        }

        return $statement->fetch();
    }

    protected function getDB(): PDOConnector
    {
        return PDOConnector::getInstance();
    }
}