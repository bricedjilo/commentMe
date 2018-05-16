<?php

namespace App\Controllers;
use App\Domain\SessionsManager;

class SessionsController {

    public function create() {
        return view('index', []);
    }

    public function store() {
        try {
            if(isset($_POST['submit'])) {
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                (new SessionsManager)->getSession($email, $_POST['password']);
                redirect('');
            }
        } catch (\Exception $e) {
            $errors = explode("\n", $e->getMessage());
            return view('registrations.create', compact('errors'));
        }
    }

}
