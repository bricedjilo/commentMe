<?php

namespace App\Core\Database;

class DBConnection {

    public static function make($config) {
        try {
            return new \PDO(
                $config['connection'] . ":" . $config['port'] . "; dbname=" . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }

}
