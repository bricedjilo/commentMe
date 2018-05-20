<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\{ ProductsManager, CommentsManager, CategoriesManager };
use App\Exception\{ CustomException, CustomExceptionType };
use App\Services\Validation;


class CommentsController {

    public function index() {
        $categoriesManager = new CategoriesManager;
        $productManager = new ProductsManager;
        $categories = $categoriesManager->getAllCategories();
        $recentProducts = $productManager->getRecentProducts(5);
        $product = $recentProducts[0];
        $productComments= $productManager->getProductComments($product["id"], 5);
        $count = $productManager->getProductCommentsCount($product["id"])[0];
        return view('comments.index',
            compact('recentProducts'),
            compact('product'),
            compact('categories'),
            compact('productComments'),
            compact('count')
        );
    }

    public function store() {
        try {
            $product_id = trim(filter_input(INPUT_POST, "product_id", FILTER_SANITIZE_STRING));
            $created_by = App::get('session')->get('user')->getId();

            $comment = Validation::isNotEmpty([
                "title" => filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING),
                "body" => filter_input(INPUT_POST, "body", FILTER_SANITIZE_STRING)
            ]);

            Validation::stringLength($comment["body"], 1000);

            if(Validation::isInt(["product_id" => $product_id])) {
                $comment["product_id"] = $product_id;
                $comment["created_by"] = $created_by;
            }

            if( (new CommentsManager)->create($comment) ) {
                App::get('session')->set(["successes" => ["Your Comment \"{$comment['title']}\" has been added."]]);
                redirect("products/{$product_id}");
            }
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect("products/{$product_id}");
        }
    }

}
