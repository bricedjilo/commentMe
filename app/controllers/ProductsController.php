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
        redirect('');
    }

    public function show($id)
    {
        $productManager = new ProductsManager;
        $categoriesManager = new CategoriesManager;
        $categories = $categoriesManager->getAllCategories();
        $recentProducts = $productManager->getRecentProducts(5);
        $archives = $productManager->getProductsArchives();
        $product = $productManager->getProductAndCategory($id)[0];
        $productComments= $productManager->getProductComments($id, 5);
        $count = $productManager->getProductCommentsCount($product["id"])[0];

        return view('products.show',
            compact('categories'),
            compact('recentProducts'),
            compact('product'),
            compact('productComments'),
            compact('count'),
            compact('archives')
        );
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

            if( (new ProductsManager)->create($product, $image) ) {
                App::get('session')->set(["successes" => ["Product \"{$product['name']}\" has been added."]]);
                redirect('admin/products/create');
            }
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('admin/products/create');
        }
    }

    public function destroy($id) {
        try {
            if( (new ProductsManager)->delete($id) ) {
                redirect('admin/products');
            }
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", "Must delete ")]);
            redirect('admin/products');
        }
    }

}
