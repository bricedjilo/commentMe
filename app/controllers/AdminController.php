<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\CategoriesManager;
use App\Domain\UsersManager;
use App\Domain\ProductsManager;
use App\Exception\{ CustomException, CustomExceptionType };
use App\Services\Validation;

class AdminController {

    public function index() {
        return view('admin.index');
    }

    public function users() {
        try {
            $users = (new UsersManager)->getAllUsers();
            return view('admin.users', compact('users'));
        } catch (CustomException $ce) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('admin/users');
        }
    }

    public function create() {
        try {
            $categories = (new CategoriesManager)->getAllCategories();
            return view('admin.create', compact('categories'));
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('admin/products/create');
        }
    }

    public function store() { }

    public function products() {
        $products = (new ProductsManager())->getAllProductsAndCategories();
        return view('admin.products', compact('products'));
    }



}
