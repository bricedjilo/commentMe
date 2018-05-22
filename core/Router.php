<?php

namespace App\Core;

use App\Core\App;
use App\Exception\RouteNotFoundException;

class Router {

    protected $routes = [
        'GET' => [
            'id' => []
        ],
        'POST' => [],
        'DELETE' => []
    ];

    public function fallback() {

    }

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
        $segments = explode('/', $uri);
        $count = count(array_filter($segments));
        $i = 0;
        for ( ; $i < $count; $i++ ) {
            if ( strcmp($segments[$i], "{id}") == 0 && $i == $count-1 ) {
                $this->routes['DELETE']['id'][implode('/', array_slice($segments, 0, $i))] = $controller;
                break;
            }
        }
    }

    public static function load($file) {
        $router = new static;
        require $file;
        return $router;
    }

    public function direct($uri, $requestType) {
        $user = App::get('session')->get('user');
        if( preg_match('/admin/', $uri) && ( ! $user || strcmp( $user->getRole(), "admin" ) != 0 ) ) {
                redirect('');
        }

        $segments = explode('/', $uri);
        $count = count(array_filter($segments));

        $params = implode('/', array_slice($segments, 0, $count-1) );
        if( isset($_POST["_METHOD"]) &&
            array_key_exists($params, $this->routes['DELETE']['id']) &&
            filter_var($segments[$count-1], FILTER_VALIDATE_INT) )
        {
            return $this->callAction(trim($_POST['id']), ...explode('@', $this->routes['DELETE']["id"][$params]));
        }

        if( $count == 2 ) {
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
        }

        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                null, ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new RouteNotFoundException("Route is not defined for " . $uri);
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
