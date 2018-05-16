<?php

$router->get('', 'HomeController@index');
// $router->get('users', 'UsersController@index');
// $router->get('users/{id}', 'UsersController@show');
$router->get('register', 'RegistrationsController@create');
$router->get('activation', 'RegistrationsController@show');
$router->get('admin', 'AdminController@index');

$router->post('login', 'SessionsController@store');
$router->post('register', 'RegistrationsController@store');
