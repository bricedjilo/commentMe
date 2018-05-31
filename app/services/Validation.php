<?php

namespace App\Services;

use App\Core\App;
use App\Exception\{ CustomException, CustomExceptionType };

class Validation {

    private const MIN_LENGTH = 6;
    private const MAX_LENGTH = 15;

    public static function isPasswordValid($password, $confPassword) {
        $errors = "";
        if ( empty($password) || $password != $confPassword )
            $errors .= "Please provide passwords and make sure they match. \n";
        if ( strlen($password) < static::MIN_LENGTH || strlen($password) > static::MAX_LENGTH )
            $errors .= "Password length must be between " . static::MIN_LENGTH . " and "
            . static::MAX_LENGTH . " characters \n";
        if ( ! preg_match("/\d+/", $password) )
            $errors .= "Password must contain at least 1 digit. \n";
        if ( ! preg_match("/[A-Z]+/", $password) )
            $errors .= "Password must contain at least 1 capital letter. \n";
        if ( ! preg_match("/[a-z]+/", $password) )
            $errors .= ("Password must contain at least 1 lowercase letter. \n");
        if ( ! preg_match("/[^a-zA-Z0-9]+/", $password))
            $errors .= ("Password must contain letters, numbers and at least one special character. \n");
        if( strlen($errors) > 0) throw new CustomException(CustomExceptionType::VALIDATION, $errors );
        return true;
    }

    public static function isUsernameValid($username) {
        $errors = "";
        if ( empty($username) )
            $errors .= "Please provide a username. \n";
        if ( strlen($username) < static::MIN_LENGTH || strlen($username) > static::MAX_LENGTH)
            $errors .= "Username length must be between " . static::MIN_LENGTH . " and "
            . static::MAX_LENGTH . " characters \n";
        if ( preg_match('/\W+/', $username) )
            $errors .= ("Username must not contain special characters. \n");
        if( strlen($errors) > 0) throw new CustomException(CustomExceptionType::VALIDATION, $errors );
        return true;
    }

    public static function isCaptchaValid($captcha) {
        $response = json_decode(file_get_contents(

                // Uncomment this line if working on localhost
                // "https://www.google.com/recaptcha/api/siteverify?secret=" . App::get('recaptcha')["localhost-server"] .

                // Comment this line if working on localhost
                "https://www.google.com/recaptcha/api/siteverify?secret=" . App::get('recaptcha')["heroku-server"] .

                "&response=" . $captcha .
                "&remoteip=" . $_SERVER['REMOTE_ADDR']
            ), true);
        if( ! $response['success'] ) {
            throw new CustomException(CustomExceptionType::VALIDATION,
            "Please show that you are a Human by checking the \"I'm not a robot\" box.");
        }
        return true;
    }

    public static function isEmailValid($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        throw new CustomException(CustomExceptionType::VALIDATION,
        "$email is not a valid email address.");
    }

    public static function isNotEmpty($inputs) {
        foreach($inputs as $key => $value) {
            if(empty($inputs[$key] = trim($value))) {
                throw new CustomException(CustomExceptionType::ILLEGAL_ARGS, "Form field \"{$key}\" must not be empty.");
            }
        }
        return $inputs;
    }

    public static function isInt($inputs) {
        foreach($inputs as $key => $value) {
            if ( ! filter_var($inputs[$key] = trim($value), FILTER_VALIDATE_INT,
                    array("options" => array("min_range" => 0))) )
            {
                throw new CustomException(CustomExceptionType::ILLEGAL_ARGS, "Form field \"$key\" must be provided.");
            }
        }
        return true;
    }

    public static function isImageValid($name, $type, $size) {
        $allowed_types = ['image/jpg', 'image/png', 'image/jpeg', 'image/gif'];
        if ( ! in_array($type, $allowed_types) || $size > 1048576 || empty($name) ) {
            throw new CustomException(CustomExceptionType::ILLEGAL_ARGS, "Please provide an image that is less than 1MB");
        }
        return true;
    }

    public static function stringLength($str, $length) {
        if ( strlen($str, $length) >= 1000 ) {
            throw new CustomException(CustomExceptionType::ILLEGAL_ARGS, "Text length should be less than 1000 characters");
        }
    }

    public function isInputValid($lower, $upper) {
        if($lower && $upper) {
            if( $upper - $lower > 0) {
                return true;
            } else {
                throw new \Exception("The upper bound must be greater than than the lower bound.");
            }
        } else {
            throw new \Exception("Both lower and upper bound must be whole or natural numbers greater than 0.");
        }
    }
}
