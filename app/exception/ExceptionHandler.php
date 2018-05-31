<?php

namespace App\Exception;

use App\Core\App;
use App\Domain\Mailer;

class ExceptionHandler {

    protected static $instance = null;

    public static function getInstance()
    {
        if(!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function initialize() {
        set_exception_handler(array($this, "handleException"));
    }

    public static function handleException(\Exception $e)
    {
        if( $e instanceof RouteNotFoundException) {
            $errorType = "404";
            view("error.error", compact("errorType"));
        } else {
            $errorType = "uncaught";
            App::get('mailer')->sendErrorLogsEmail($e->getTraceAsString());
            view("error.error", compact("errorType"));
        }
    }


}
