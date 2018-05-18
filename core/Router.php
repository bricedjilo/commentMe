<?php

namespace App\Core;

class Router {

    protected $routes = [
        'GET' => [
            'delete' => []
        ],
        'POST' => []
    ];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function delete($uri, $controller) {
        $this->routes['GET']["delete"][explode('/', $uri)[0]] = $controller;
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
                null, ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        $uri = explode('/', $uri);
        if(array_key_exists("delete", $this->routes[$requestType])) {
            return $this->callAction(
                $uri[1], ...explode('@', $this->routes[$requestType]["delete"][$uri[0]])
            );
        }
        throw new \Exception("Route is not defined for " . $uri);
    }

    protected function callAction($id, $controller, $action) {
        $controllerClass = "App\\Controllers\\{$controller}";
        $controllerClass = new $controllerClass;
        if(! method_exists($controllerClass, $action)) {
            throw new \Exception("{$controller} does not respond to {$action} action.");
        }
        if(! $id) {
            return $controllerClass->$action();
        } else {
            return $controllerClass->$action($id);
        }

    }

}
