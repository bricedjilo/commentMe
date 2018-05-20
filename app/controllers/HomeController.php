<?php

namespace App\Controllers;
use App\Core\App;

class HomeController {

    public function index() {
        if(App::get('session')->get('user')) {
            redirect('comments');
        }
        return view('home.index');
    }

    public function store() {

    }

}
