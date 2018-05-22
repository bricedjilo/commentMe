<?php

namespace App\Domain;
use App\Core\App;
use App\Models\User;
use App\Exception\{ CustomException, CustomExceptionType };

class UsersManager {

    public function create($user)
    {
        if ( App::get('database')->isPropDuplicate('users',
                ["username" => $user["username"]], 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
            "{$user["username"]} is already in use. Please enter a different username.");
        }
        if ( App::get('database')->isPropDuplicate(
                'users', ["email" => $user["email"]], 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
            "{$user["email"]} is already in use. Please enter a different email address.");
        }
        if ( ! App::get('database')->insert('users', $user, 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_STORE,
            "We were unable to create an account.");
        }
        if ( App::get('mailer')->sendActivationEmail($user["email"]) )
        {
            return "Your account has been created. You may log in.";
        } else {
            throw new CustomException(CustomExceptionType::EMAIL,
            "Oops!! There was a problem. Your activation email could not be sent.");
        }
    }

    public function getAllUsers() {
        return App::get('database')->all('users', 'App\Models\User');
    }

}
