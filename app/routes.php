<?php

$router->get('', 'HomeController@index');
$router->get('register', 'RegistrationsController@create');
$router->get('activation', 'RegistrationsController@show');
$router->get('comments', 'CommentsController@index');
$router->get('products', 'ProductsController@index');
$router->get('admin', 'AdminController@index');
$router->get('admin/users', 'AdminController@users');
$router->get('admin/products', 'AdminController@products');
$router->get('admin/products/create', 'AdminController@create');

$router->post('login', 'SessionsController@store');
$router->post('register', 'RegistrationsController@store');
$router->post('products', 'ProductsController@store');
$router->delete('products/{id}', 'ProductsController@destroy');
