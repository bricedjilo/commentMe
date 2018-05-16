<?php

namespace App\Domain;

use App\Core\App;

class SessionsManager {

    public function getSession($email, $password) {
        App::get('database')->findByProperty('users', "email", ["email" => $email]);
    }

}
