<?php

namespace App\Models;

class Comment {

    protected $id;
    protected $title;
    protected $body;
    protected $created_by;
    protected $product_id;
    protected $created_on;
    protected $updated_on;


    public function __construct() { }

    public static function withProperties($title, $body, $created_by, $product_id) {
        $instance = new self();
        $instance->$title = $title;
        $instance->$body = $body;
        $instance->$created_by = $created_by;
        $instance->$product_id = $product_id;
        return $instance;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getBody() {
        return $this->body;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getCreatedOn() {
        return $this->created_on;
    }

    public function getUpdatedOn() {
        return $this->updated_on;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setBody($body) {
        $this->body = $title;
    }
}
