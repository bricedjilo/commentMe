<?php

namespace App\Controllers;
use App\Services\Utility;
use App\Services\Validation;
use App\Domain\UsersManager;

class RegistrationsController {

    protected $errors=[];
    protected $message = "";

    public function create() {
        return view('registrations.create', compact("errors"));
    }

    public function store() {
        try {
            if(isset($_POST['submit']) && Validation::isCaptchaValid($_POST['g-recaptcha-response'])) {
                $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
                $password = trim($_POST['password']);
                $message = (new UsersManager)->create(
                    trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING)),
                    trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING)),
                    (Validation::isEmailValid($email)) ? $email : "",
                    (Validation::isPasswordValid($password, trim($_POST['conf-password']))) ?
                        Utility::encode($password) : ""
                );
                redirect('');
            }
        } catch (CustomException $ce) {
            $errors = explode("\n", $e->getMessage());
            return view('registrations.create', compact('errors'));
        } 
    }

}
