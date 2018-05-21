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

    public function findById($id) {
        return App::get('database')->findByProperty('products', ["id" => $id], 'App\Models\Product');
    }

    public function getAllProductsAndCategories() {
        return App::get('database')->innerJoinOn(
            'products', 'categories', ['products.category_id', 'categories.id'], [
                "products.id", "products.name", "products.image",
                "products.description", "categories.category"
            ]);
    }

    public function getProductAndCategory($id) {
        return App::get('database')->getFromWhereIdOrderBy(
            ["products.id", "products.name", "products.image", "category_id", "created_on",
            "products.description", "categories.category"],
            ["products", "categories"],
            ["products.category_id = categories.id"],
            ["products.id" => $id],
            "", ""
        );
    }

    public function getRecentProducts($number) {
        return App::get('database')->getFromWhereIdOrderBy(
            ["products.id", "products.name", "products.image", "category_id", "created_on",
            "products.description", "categories.category"],
            ["products", "categories"],
            ["products.category_id = categories.id"],
            [], "created_on", $number
        );
    }

    public function getProductComments($id, $limit) {
        return App::get('database')->getFromWhereIdOrderBy(
            ["product_id", "title", "body","created_on", "firstname", "lastname", "email", "username"],
            ["comments", "users"],
            ["comments.created_by = users.id"],
            ["product_id" => $id],
            "created_on",
            $limit
        );
    }

    public function getProductCommentsCount($id) {
        return App::get('database')->countCommentsById(
            "comments", ["product_id" => $id]
        );
    }

    public function getProductsOfCategory($id) {
        return App::get('database')->getFromWhereIdOrderBy(
            ["products.id", "created_on", "name", "description", "image", "category_id", "categories.category"],
            ["products", "categories"],
            ["category_id = categories.id"],
            ["category_id" => $id],
            "", ""
        );
    }

    public function getProductsArchives() {
        return App::get('database')->getFromGroupBy(
            ["DATE(created_on) date"],
            "products",
            "DATE(created_on)",
            "created_on"
        );
    }

    public function getProductsArchivesFor($date) {
        return App::get('database')->getFromWhereIdOrderBy(
            ["products.id", "created_on", "name", "description", "image", "category_id", "categories.category"],
            ["products", "categories"],
            ["category_id = categories.id"],
            ["DATE(created_on)" => $date],
            "created_on", ""
        );
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
