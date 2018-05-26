<?php

namespace App\Core\Database;

use App\Exception\{ CustomException, CustomExceptionType };

class DBConnection {

    public static function make($config) {
        try {
            return new \PDO(
                "mysql:dbname=" . $config["name"] .
                ";host=" . $config["server"],
                $config["username"],
                $config["password"]
            );
        } catch (\PDOException $e) {

        }

    }

}
