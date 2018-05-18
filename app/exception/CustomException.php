<?php

namespace App\Exception;

class CustomException extends \Exception {

    protected $type;
    protected $message;

    public function __construct($type, $message) {
        parent::__construct($message);
        $this->type = $type;
    }

    public function getType() {
        return $type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}
