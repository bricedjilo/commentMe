<?php

namespace App\Core\Database;

use App\Models\User;
use App\Models\Category;
use App\Exception\ { CustomException, CustomExceptionType };

class QueryBuilder {

    protected $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all($table, $intoClass)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }

    public function innerJoinOn($table1, $table2, $joinProps, $props) {
        $sql = "SELECT " . implode(', ', $props) .
                " FROM {$table1} INNER JOIN {$table2} " .
                " ON {$joinProps[0]} = {$joinProps[1]}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insert($table, $model, $intoClass)
    {
        $sql = sprintf( 'INSERT INTO %s (%s) VALUES (%s)',
            $table, implode(', ', array_keys($model)),
            ':' . implode(', :', array_keys($model))
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($model);
    }

    public function delete($table, $params)
    {
        $sql = "DELETE FROM {$table} WHERE " . $this->getAndConditions($params);
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($params);
    }

    public function isPropDuplicate($table, $params, $intoClass) {
        return (count($this->findByProperty($table, $params, $intoClass)) > 0);
    }

    public function findByProperty($table, $params, $intoClass)
    {
        $conditions = "";
        $keys = array_keys($params);
        for ( $i=0; $i<count($keys); $i++ ) {
            $conditions .= " $keys[$i] = :$keys[$i] ";
            if ( $i == count($keys)-1 ) {
                break;
            }
            $conditions .= "OR";
        }
        $sql = "SELECT * FROM {$table} WHERE $conditions";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }

    public function getAndConditions($params) {
        $conditions = "";
        $keys = array_keys($params);
        for ( $i=0; $i<count($keys); $i++ ) {
            $conditions .= " $keys[$i] = :$keys[$i] ";
            if ( $i == count($keys)-1 ) {
                break;
            }
            $conditions .= "AND";
        }
        return $conditions;
    }
}
