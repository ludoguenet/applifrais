<?php

namespace Models;

use Database\PDOConnector;

abstract class Model
{
    public function add(array $params)
    {
        $firstParenthesis = '';
        $counter = 0;

        foreach ($params as $key => $param) {
            if ($counter === 0) {
                $firstParenthesis .= "INSERT INTO {$this->table}(" . $key;
            } elseif ($counter === count($params) - 1) {
                $firstParenthesis .= ', ' . $key . ')';
            } else {
                $firstParenthesis .= ', ' . $key . '';
            }

            $counter++;
        }

        $secondParenthesis = '';
        $counter = 0;

        foreach ($params as $key => $param) {
            if ($counter === 0) {
                $secondParenthesis .= "VALUES(:" . $key;
            } elseif ($counter === count($params) - 1) {
                $secondParenthesis .= ', :' . $key . ')';
            } else {
                $secondParenthesis .= ', :' . $key . '';
            }

            $counter++;
        }
        
        $statement = $this->getDB()->prepare($firstParenthesis . ' ' . $secondParenthesis);

        $statement->execute($params);
    }

    /**
     * Récupère des données sur une clause WHERE en passant plusieurs valeurs.
     *
     * @param string|array $column
     * @param string $value
     */
    public function where(string|array $columns, string|array $value, $all = false)
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

        if ($all) {
            return $statement->fetchAll();
        }

        return $statement->fetch();
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";

        $statement = $this->getDB()->prepare($query);

        $statement->execute([
            'id' => $id
        ]);
    }

    protected function getDB(): PDOConnector
    {
        return PDOConnector::getInstance();
    }
}