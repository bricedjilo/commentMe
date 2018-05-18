<?php

namespace App\Models;

class Category {

    protected $id;
    protected $category;

    public function __contruct() {}

    public function __withProperties($category) {
        $this->category = $category;
    }

    public function getId() {
        return $this->id;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setId($id) {
        $this->id = $id;
    }

}
