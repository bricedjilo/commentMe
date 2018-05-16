<?php

namespace App\Core\Database;

use App\Core\User;

class QueryBuilder {

    protected $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass) {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }

    public function insert($table, $model) {
        if(!$this->isPropDuplicate($table, "email", ["email" => $model['email']])) {
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $table,
                implode(', ', array_keys($model)),
                ':' . implode(', :', array_keys($model))
            );
            $statement = $this->pdo->prepare($sql);
            $statement->execute($model);
        }
    }

    public function isPropDuplicate($table, $prop, $params) {
        if(count($this->findByProperty($table, $prop, $params)) > 0)
            throw new \Exception("{$params['email']} is already in use. Please enter a different email address.");
        return false;
    }

    public function findByProperty($table, $prop, $params) {
        $sql = sprintf(
            "SELECT * FROM %s WHERE %s = %s", $table, $prop, ":{$prop}"
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll();
    }
}
