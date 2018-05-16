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
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $message = (new UsersManager)->create(
                    filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING),
                    filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING),
                    (Validation::isEmailValid($email)) ? $email : "",
                    (Validation::isPasswordValid($_POST['password'], $_POST['conf-password'])) ?
                        Utility::encode($_POST['password']) : ""
                );
                redirect('');
            } 
        } catch (\Exception $e) {
            $errors = explode("\n", $e->getMessage());
            return view('registrations.create', compact('errors'));
        }
    }

}
