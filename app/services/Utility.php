<?php

namespace App\Services;

class Utility {

    public static function encode($password) {
        return password_hash($password, PASSWORD_BCRYPT, [
            'cost' => 12
        ]);
    }

}
