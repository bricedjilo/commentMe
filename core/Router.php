<?php

namespace App\Core;

class Router {

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public static function load($file) {
        $router = new static;
        require $file;
        return $router;
    }

    public function define($routes) {
        $this->routes = $routes;
    }

    public function direct($uri, $requestType) {
        if(array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new \Exception("Route is not defined for " . $uri);
    }

    protected function callAction($controller, $action) {
        $controllerClass = "App\\Controllers\\{$controller}";
        $controllerClass = new $controllerClass;
        if(! method_exists($controllerClass, $action)) {
            throw new \Exception("{$controller} does not respond to {$action} action.");
        }
        return $controllerClass->$action();
    }

}
