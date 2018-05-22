<?php

namespace App\Core;

final class Session {

    private const SESSION_AGE = 1800;
    private static $instance = null;

    protected function __construct() {}

    public static function getInstance()
    {
        if(!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public static function initialize()
    {
        $secure = $httponly = true;
        if ( '' === session_id() )
        {
            $params = session_get_cookie_params();
            session_set_cookie_params(
                $params['lifetime'], $params['path'], $params['domain'], $secure, $httponly
            );
            return session_start();
        }
        return session_regenerate_id(true);
    }

    public static function set($array)
    {
        foreach ($array as $key => $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function delete($key)
    {
        if ( !is_string($key) )
            throw new InvalidArgumentTypeException('Session key must be string value');
        static::initialize();
        unset($_SESSION[$key]);
        static::expire();
    }

    private static function expire()
    {
        $last = isset($_SESSION['LAST_ACTIVE']) ? $_SESSION['LAST_ACTIVE'] : false ;

        if (false !== $last && (time() - $last > static::$SESSION_AGE))
        {
            static::destroy();
        }
        $_SESSION['LAST_ACTIVE'] = time();
    }

    public static function destroy()
    {
        if ( '' !== session_id() )
        {
            $_SESSION = array();
            if (ini_get("session.use_cookies"))
            {
                $params = session_get_cookie_params();
                setcookie( session_name(), '', time() - 42000, $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
        }
    }

}
