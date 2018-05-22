<?php

namespace App\Exception;

class CustomExceptionType {

    public const SQL_CONSTRAINT = "SQL Constraint";
    public const SQL_STORE = "SQL: Unable to store item";
    public const VALIDATION = "Unable to validate";
    public const ILLEGAL_ARGS = "Illegal Argument";
    public const EMAIL = "Unable to send Activation Email";
    public const AUTH = "Unable to Authenticate user";

}
