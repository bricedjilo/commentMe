<?php

namespace App\Controllers;

use App\Core\App;
use App\Domain\{ ProductsManager, CategoriesManager };

class ArchivesController {

    public function index() {
        redirect('');
    }

    public function show($date) {

        $productManager = new ProductsManager;
        $categoriesManager = new CategoriesManager;
        // die((string)$date);
        // die((\DateTime::createFromFormat('m-d-Y', $date))->format('Y-m-d'));
        $date = (\DateTime::createFromFormat('m-d-Y', $date))->format('Y-m-d');
        $products = $productManager->getProductsArchivesFor($date);
        $categories = $categoriesManager->getAllCategories();
        $recentProducts = $productManager->getRecentProducts(5);
        $archives = $productManager->getProductsArchives();


        // var_dump($products); die();
        return view('archives.show',
            compact('categories'),
            compact('recentProducts'),
            compact('archives'),
            compact('products')
        );

    }

}
