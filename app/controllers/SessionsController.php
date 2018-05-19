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
            if(isset($_POST['submit'])) {
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                (new SessionsManager)->getSession($email, trim($_POST['password']));
                redirect('comments');
            }
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
