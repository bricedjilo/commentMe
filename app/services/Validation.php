<?php

namespace App\Services;
use App\Services\CustomException;

class Validation {

    private const MIN_PASSWORD_LENGTH = 8;
    private const MAX_PASSWORD_LENGTH = 15;

    public static function isPasswordValid($password, $confPassword) {
        $errors = "";
        if (empty($password) || $password != $confPassword)
            $errors .= "Please provide passwords and make sure they match. \n";
        if (strlen($password) < static::MIN_PASSWORD_LENGTH || strlen($password) > static::MAX_PASSWORD_LENGTH)
            $errors .= "Password length must be between " . static::MIN_PASSWORD_LENGTH . " and "
            . static::MAX_PASSWORD_LENGTH;
        if (!preg_match("/\d+/", $password))
            $errors .= "Password must contain at least 1 digit. \n";
        if (!preg_match("/[A-Z]+/", $password))
            $errors .= "Password must contain at least 1 capital letter. \n";
        if (!preg_match("/[a-z]+/", $password))
            $errors .= ("Password must contain at least 1 lowercase letter. \n");
        if (!preg_match("/[^a-zA-Z0-9]+/", $password))
            $errors .= ("Password must contain letters, numbers and one special character only. \n");
        if(strlen($errors) > 0) throw new CustomException("Validation", $errors);
        return true;
    }

    public static function isCaptchaValid($captcha) {
        $response = json_decode(file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=6LedT1kUAAAAAPbi-khy5HKU3WY9StPY1P4syI0t&response="
                . $captcha
                . "&remoteip=" . $_SERVER['REMOTE_ADDR']
            ), true);
        if(!$response['success']) {
            throw new \Exception("Please show that you are a Human by checking the \"I'm not a robot\" box.");
        }
        return true;
    }

    public static function isEmailValid($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        throw new \Exception("$email is not a valid email address.");
    }
}
