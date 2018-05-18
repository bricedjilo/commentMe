<?php

namespace App\Domain;

use App\Core\App;
use App\Exception\{ CustomExceptionType, CustomException };
use App\Models\User;
use App\Services\Utility;

class ProductsManager {

    public function getAllProducts() {
        return App::get('database')->all('products', 'App\Models\Product');
    }

    public function getAllProductsAndCategories() {
        return App::get('database')->innerJoinOn(
            'products', 'categories', ['products.category_id', 'categories.id'], [
                "products.id", "products.name", "products.image",
                "products.description", "categories.category"
            ]);
    }

    public function create($product, $image)
    {
        if ( ! App::get('database')->isPropDuplicate(
            'products', ["name" => $product["name"], "image" => $product["image"]], 'App\Models\Product') )
        {
            if ( move_uploaded_file($image['tmp_name'], "public/images/products" . "/" . $image["name"]) != true ||
                ! App::get('database')->insert('products', $product, 'App\Models\Product'))
            {
                throw new CustomException(CustomExceptionType::SQL_STORE,
                    "We could not add {$product["name"]}. Please check the fields and try again.");
            }
        } else {
            throw new CustomException(
                CustomExceptionType::SQL_CONSTRAINT,
                "We could not add \"{$product["name"]}\".
                A product with that name or image name ({$product["image"]}) already exists."
            );
        }
        return true;
    }

    public function delete($id) {
        if( ! App::get('database')->delete('products', ["id" => $id]) ) {
            throw new CustomException(CustomExceptionType::SQL_STORE,
                "We could not delete {$product["name"]}. Something went wrong.");
        }
        return true;
    }

}
