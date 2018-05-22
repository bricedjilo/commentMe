<?php

namespace App\Services;

class Utility {

    public static function encode($password) {
        return password_hash($password, PASSWORD_BCRYPT, [
            'cost' => 12
        ]);
    }

    public static function verify($password, $hash) {
        return password_verify($password, $hash);
    }

}
