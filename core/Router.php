<?php

namespace App\Core;

class Router {

    protected $routes = [
        'GET' => [
            'id' => []
        ],
        'POST' => [],
        'DELETE' => []
    ];

    public function get($uri, $controller) {
        $segments = explode('/', $uri);
        $count = count(array_filter($segments));
        $i = 0;
        for ( ; $i < $count; $i++ ) {
            if ( strcmp($segments[$i], "{id}") == 0 && $i == $count-1 ) {
                $this->routes['GET']['id'][implode('/', array_slice($segments, 0, $i))] = $controller;
                break;
            }
        }
        if ( $i == $count ) {
            $this->routes['GET'][$uri] = $controller;
        }
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function delete($uri, $controller) {
        $this->routes['DELETE'][explode('/', $uri)[0]] = $controller;
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
        $id = null;
        $segments = explode('/', $uri);
        $count = count(array_filter($segments));

        if( array_key_exists( $count-1, $segments ) && filter_var($segments[$count-1], FILTER_VALIDATE_INT) )
        {
            $id = $segments[$count-1];
            return $this->callAction(
                $id, ...explode('@', $this->routes[$requestType]["id"][
                implode('/', array_slice($segments, 0, $count-1))
            ]));
        } else if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                $id, ...explode('@', $this->routes[$requestType][$uri])
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
        }
        return $controllerClass->$action($id);    
    }

}
