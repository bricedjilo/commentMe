<?php

namespace App\Controllers;
use App\Domain\SessionsManager;
use App\Exception\CustomException;
use App\Core\App;

class SessionsController {

    public function store() {
        try {
            $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
            (new SessionsManager)->getSession($username, $password);
            redirect('comments');
        } catch (CustomException $ce) {
            App::get('session')->set(["errors" => explode("\n", $ce->getMessage())]);
            return redirect('');
        }
    }

    public function destroy() {
        (new SessionsManager)->delete();
        App::get('session')->set(["successes" => []]);
        redirect('');
    }
}
