<?php

namespace App\Core;

use App\Core\App;

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
            } else if ( strcmp($segments[$i], "{date}") == 0 && $i == $count-1 ) {
                $this->routes['GET']['date'][implode('/', array_slice($segments, 0, $i))] = $controller;
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
        $user = App::get('session')->get('user');
        if( preg_match('/admin/', $uri) )
        {
            if( $user && strcmp( $user->getRole(), "admin" ) != 0 ) {
                redirect('');
            }
        }

        $segments = explode('/', $uri);
        $count = count(array_filter($segments));
    
        if( $count > 1 && array_key_exists( $count-1, $segments ) ) {
            $params = implode('/', array_slice($segments, 0, $count-1) );

            if (  count(array_filter(explode('-', $segments[$count-1]))) == 3
                    && checkdate( ...explode('-', $segments[$count-1]) ) ) {

                $date = $segments[$count-1];
                $routesWithDates =  $this->routes[$requestType]["date"];
                if( array_key_exists( $params, $routesWithDates ) ) {
                    return $this->callAction($date, ...explode('@', $routesWithDates[$params]));
                }

            } else if( ( filter_var($segments[$count-1], FILTER_VALIDATE_INT) ) )
            {
                $id = $segments[$count-1];
                $routesWithIds =  $this->routes[$requestType]["id"];
                if( array_key_exists( $params, $routesWithIds ) ) {
                    return $this->callAction($id, ...explode('@', $routesWithIds[$params]));
                }
            }

        } else if (array_key_exists($uri, $this->routes[$requestType])) {

            return $this->callAction(
                null, ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new \Exception("Route is not defined for " . $uri);
    }

    protected function callAction($id, $controller, $action)
    {
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
