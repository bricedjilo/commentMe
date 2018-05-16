<?php

namespace App\Controllers;

class HomeController {

    public function index() {
        return view('home.index', []);
    }

    public function store() {
        if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            die("rgehqwthrthyher");
            (new SessionsManager)->getSession($email, $_POST['password']);
            redirect('');
        }
        // (new SessionsController)->store();
    }

}
