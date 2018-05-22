<?php

namespace App\Controllers;

use App\Core\App;
use App\Services\{ Utility, Validation };
use App\Domain\UsersManager;
use App\Exception\{ CustomException, CustomExceptionType };

class RegistrationsController {

    protected $errors=[];
    protected $message = "";

    public function create() {
        return view('registrations.create');
    }

    public function show() {
        if ( ! $message ) {
            redirect('');
        }
        return view('registrations.activation');
    }

    public function store() {
        try {
            if(Validation::isCaptchaValid($_POST['g-recaptcha-response']))
            {
                $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
                $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
                $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
                $confPassword = trim(filter_input(INPUT_POST, "conf-password", FILTER_SANITIZE_STRING));

                $user = Validation::isNotEmpty([
                    "firstname" => filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING),
                    "lastname" => filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING)
                ]);
                if ( Validation::isEmailValid($email) &&
                    Validation::isPasswordValid($password, $confPassword) &&
                    Validation::isUsernameValid($username)
                ) {
                    $user["email"] = $email;
                    $user["password"] = Utility::encode($password);
                    $user["username"] = $username;
                }
                $message = (new UsersManager)->create($user);
                App::get('session')->set(["successes" => [$message]]);
                redirect('');
            }
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('register');
        }
    }

}
