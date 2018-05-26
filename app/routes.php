<?php

$router->get('', 'HomeController@index');
$router->get('register', 'RegistrationsController@create');
$router->get('activation', 'RegistrationsController@show');
$router->get('comments', 'CommentsController@index');
$router->get('categories/{id}', 'CategoriesController@show');
$router->get('products', 'ProductsController@index');
$router->get('products/{id}', 'ProductsController@show');
$router->get('archives/{date}', 'ArchivesController@show');
$router->get('logout', 'SessionsController@destroy');
$router->get('fizzbuzz', 'GamesController@create');

$router->post('login', 'SessionsController@store');
$router->post('register', 'RegistrationsController@store');
$router->post('comments', 'CommentsController@store');
$router->post('fizzbuzz', 'GamesController@store');

// Admin
$router->get('admin', 'AdminController@index');
$router->get('admin/users', 'AdminController@users');
$router->get('admin/products', 'AdminController@products');
$router->get('admin/products/create', 'AdminController@create');
$router->post('products', 'ProductsController@store');          // admin
$router->delete('admin/products/{id}', 'ProductsController@destroy'); // admin
