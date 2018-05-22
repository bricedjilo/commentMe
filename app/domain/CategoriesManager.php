<?php

namespace App\Domain;

use App\Core\App;
use App\Exception\{ CustomExceptionType, CustomException };
use App\Models\User;
use App\Services\Utility;

class CategoriesManager {

    public function getAllCategories() {
        return App::get('database')->all('categories', 'App\Models\Category');
    }

    public function findById($id) {
        return App::get('database')->findByProperty('categories', ["id" => $id], 'App\Models\Category');
    }

}
