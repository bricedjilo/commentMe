<?php

namespace App\Domain;

use App\Core\App;
use App\Exception\{ CustomExceptionType, CustomException };
use App\Models\User;
use App\Services\Utility;

class SessionsManager {

    public function getSession($username, $password)
    {
        $users = array_filter(App::get('database')->findByProperty("users", ["username" => $username], 'App\Models\User'));
        if ( empty(array_filter($users)) )
        {
            throw new CustomException(CustomExceptionType::AUTH, "Incorrect email or password. Try again.");
        } elseif ( count(array_filter($users)) === 1 ) {
            if( Utility::verify($password, $users[0]->getPassword()) ) {
                App::get('session')->set(["user" => $users[0]]);
                return App::get('session');
            } else {
                throw new CustomException(CustomExceptionType::AUTH, "Incorrect email or password. Try again.");
            }
        } else {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
                "Oops .. Something went wrong. We could not log you in.");
        }
    }

    public function delete() {
        session_unset();
        redirect('');
    }
}
