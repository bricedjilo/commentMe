<?php

namespace App\Domain;
use App\Core\App;
use App\Models\User;

class UsersManager {

    public function create($firstname, $lastname, $email, $password) {
        $user = new User($firstname, $lastname, $email, $password);
        if ( App::get('database')->isPropDuplicate('users', ["email" => $model['email']], 'App\Models\User') )
        {
            throw new CustomException(CustomExceptionType::SQL_CONSTRAINT,
            "{$params['email']} is already in use. Please enter a different email address.");
        }
        if ( ! App::get('database')->insert('users', $user->toArray()) )
        {
            throw new CustomException(CustomExceptionType::SQL_STORE,
            "We were unable to create an account.");
        }
        if ( App::get('mailer')->sendActivationEmail($email) )
        {
            return "You have registered and the activation mail is sent to your email.
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
