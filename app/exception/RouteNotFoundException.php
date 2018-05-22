<?php

namespace App\Exception;

class RouteNotFoundException extends \Exception {

    protected $message;

    public function __construct($message) {
        parent::__construct($message);;
    }

}
