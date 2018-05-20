<?php

use App\Core\App;
use App\Core\Session;
use App\Core\Database\{ DBConnection, QueryBuilder };
use App\Domain\Mailer;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    DBConnection::make(App::get('config')['database'])
));

App::bind('mailer', (new Mailer())->getMailer(
    App::get('config')['gmailer']
));

App::bind('session', (Session::getInstance()));
App::get('session')->initialize();


/*--- view helpers ---*/
function view($name, ...$data)
{
    foreach($data as $datum) {
        extract($datum);
    }

    $path = explode('.', $name);

    $session = App::get('session');
    $user = $session->get('user');
    $successes = App::get('session')->get('successes');
    $errors = App::get('session')->get('errors');
    $sucesses = ($successes) ?  $successes : [];
    $errors = ($errors) ?  $errors : [];
    App::get('session')->set(["successes" => []]);
    App::get('session')->set(["errors" => []]);

    return require "app/views/{$path[0]}/{$path[1]}.view.php";
}

function redirect($path) {
    header("Location: /{$path}");
}
