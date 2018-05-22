<?php

namespace App\Models;

class Product {

    protected $id;
    protected $name;
    protected $image;
    protected $description;
    protected $category_id;
    protected $created_on;
    protected $updated_on;

    public function __construct() { }

    public function __withProperties($name, $image, $description, $category_id) {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->category_id = $category_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategory() {
        return $this->category_id;
    }

    public function getCreatedOn() {
        return $this->created_on;
    }

    public function getUpdatedOn() {
        return $this->updated_on;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCategory($category_id) {
        $this->category_id = $category_id;
    }
}
