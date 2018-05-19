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
        return view('registrations.activation');
    }

    public function store() {
        try {
            if(Validation::isCaptchaValid($_POST['g-recaptcha-response']))
            {
                $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
                $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_EMAIL));
                $confPassword = trim(filter_input(INPUT_POST, "conf-password", FILTER_SANITIZE_EMAIL));

                $user = Validation::isNotEmpty([
                    "firstname" => filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING),
                    "lastname" => filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING)
                ]);
                if( Validation::isEmailValid($email) && Validation::isPasswordValid($password, $confPassword) ) {
                    $user["email"] = $email;
                    $user["password"] = Utility::encode($password);
                }
                $message = (new UsersManager)->create($user);
                App::get('session')->set(["successes" => [$message]]);
                redirect('activation');
            }
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('register');
        }
    }

}
