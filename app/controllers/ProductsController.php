<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\CategoriesManager;
use App\Domain\UsersManager;
use App\Domain\ProductsManager;
use App\Exception\{ CustomException, CustomExceptionType };
use App\Services\Validation;

class ProductsController {

    public function index() {
        $products = (new ProductsManager())->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function store()
    {
        try {
            $image = $_FILES['image'];
            $image_name = trim(filter_var($image['name'], FILTER_SANITIZE_STRING));
            $category = trim(filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_STRING));

            $product = Validation::isNotEmpty([
                "name" => filter_input(INPUT_POST, "product-name", FILTER_SANITIZE_STRING),
                "description" => filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING)
            ]);
            if(Validation::isInt(["category" => $category])) {
                $product["category_id"] = $category;
            }
            if(Validation::isImageValid($image_name, $image['type'], $image['size'])) {
                $product["image"] = $image_name;
            }

            (new ProductsManager)->create($product, $image);
            App::get('session')->set(["successes" => ["Product \"{$product['name']}\" has been added."]]);
            redirect('admin/products/create');

        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('admin/products/create');
        }
    }

    public function destroy($id) {
        try {
            (new ProductsManager())->delete($id);
            redirect('admin/products');
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('admin/products');
        }


    }

}
