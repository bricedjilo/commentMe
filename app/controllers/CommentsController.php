<?php

namespace App\Controllers;

use App\Core\App;

class CommentsController {

    public function index() {
        // $session = App::get('session');
        return view('comments.index');
    }

}
