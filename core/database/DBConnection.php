<?php

namespace App\Core\Database;

use App\Exception\{ CustomException, CustomExceptionType };

class DBConnection {

    public static function make($config) {
        try {
            // return new \PDO(
            //     $config['connection'] . ":" . "; dbname=" . $config['name'],
            //     $config['username'],
            //     $config['password'],
            //     $config['options']
            // );
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
