<?php

namespace App\Domain;
use App\Core\App;
use App\Models\User;

class UsersManager {

    public function create($firstname, $lastname, $email, $password) {
        $user = new User($firstname, $lastname, $email, $password);
        App::get('database')->insert('users', $user->toArray());
        App::get('mailer')->sendActivationEmail($email);
    }

}
