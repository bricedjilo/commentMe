<?php

namespace App\Domain;
use App\Core\App;
use App\Models\User;

class UsersManager {

    public function create($user)
    {
        $user = (User::withProperties($user["firstname"], $user["lastname"], $user["email"], $user["password"]));

        if ( App::get('database')->isPropDuplicate('users', ["email" => $user->getEmail()], 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
            "{$user->getEmail()} is already in use. Please enter a different email address.");
        }
        if ( ! App::get('database')->insert('users', $user->toArray(), 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_STORE,
            "We were unable to create an account.");
        }
        if ( App::get('mailer')->sendActivationEmail($user->getEmail()) )
        {
            return "You have registered and the activation mail has been sent to your email.
            Click the activation link to activate you account.";
        } else {
            throw new CustomException(CustomExceptionType::EMAIL,
            "Oops!! There was a problem. Your activation email could not be sent.");
        }
    }

    public function getAllUsers() {
        return App::get('database')->all('users', 'App\Models\User');
    }

}
