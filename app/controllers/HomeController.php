<?php

namespace App\Controllers;

class HomeController {

    public function index() {
        return view('home.index', []);
    }

    public function store() {
        
        // (new SessionsController)->store();
    }

}
