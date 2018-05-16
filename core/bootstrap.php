<?php

use App\Core\App;
use App\Core\Database\{ DBConnection, QueryBuilder };
use App\Domain\Mailer;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    DBConnection::make(App::get('config')['database'])
));

App::bind('mailer', (new Mailer())->getReadyMailer(
    App::get('config')['gmailer']
));

function view($name, $data=[]) {
    extract($data);
    $path = explode('.', $name);
    return require "app/views/{$path[0]}/{$path[1]}.view.php";
}

function redirect($path) {
    header("Location: /{$path}");
}
