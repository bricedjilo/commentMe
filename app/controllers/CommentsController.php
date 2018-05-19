<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\{ ProductsManager, CommentsManager, CategoriesManager };


class CommentsController {

    public function index() {
        $categoriesManager = new CategoriesManager;
        $recentProducts = (new ProductsManager)->getRecentProducts(5);
        $categories = $categoriesManager->getAllCategories();
        $categoryOfMostRecentProduct = $categoriesManager->findById($recentProducts[0]->getCategory());
        return view('comments.index',
            compact('recentProducts'),
            compact('categories'),
            compact('categoryOfMostRecentProduct')
        );
    }

}
