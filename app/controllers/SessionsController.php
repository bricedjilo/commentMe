<?php

namespace App\Controllers;
use App\Domain\SessionsManager;
use App\Exception\CustomException;

class SessionsController {

    private $session;

    public function create() {
        return view('index', []);
    }

    public function store() {
        try {
            $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
            (new SessionsManager)->getSession($username, $password);
            redirect('comments');
        } catch (CustomException $ce) {
            $errors = explode("\n", $ce->getMessage());
            return redirect('');
        } catch(\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            return redirect('');
        }
    }

    public function destroy() {
        (new SessionsManager)->delete();
        redirect('');
    }
}
