<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\{ ProductsManager, CategoriesManager };

class CategoriesController {

    public function index() {
        redirect('');
    }

    public function show($id) {
        $productManager = new ProductsManager;
        $categoriesManager = new CategoriesManager;
        $categories = $categoriesManager->getAllCategories();
        $recentProducts = $productManager->getRecentProducts(5);
        $products = $productManager->getProductsOfCategory($id);
        $category = $categoriesManager->findById($id)[0];
        $archives = $productManager->getProductsArchives();
        return view('categories.show',
            compact('categories'),
            compact('recentProducts'),
            compact('products'),
            compact('category'),
            compact('archives')
        );
    }

}
