<?php

namespace App\Domain;

use App\Core\App;
use App\Exception\{ CustomExceptionType, CustomException };
use App\Models\User;
use App\Services\Utility;

class SessionsManager {

    public function getSession($email, $password)
    {
        $users = array_filter(App::get('database')->findByProperty("users", ["email" => $email], 'App\Models\User'));
        if ( empty(array_filter($users)) ) {
            throw new CustomException(CustomExceptionType::AUTH, "Incorrect email or password. Try again.");
        } elseif ( !empty(array_filter($users)) && Utility::verify($password, $users[0]->getPassword()) ) {
            App::get('session')->set(["user" => $users[0]]);
            // var_dump($_SESSION); die();
            return App::get('session');
        } else {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
                "Oops .. Something went wrong. We could not log you in.");
        }
    }

    public function delete() {
        session_unset();
        redirect('');
        // var_dump($_SESSION); die();
    }
}
