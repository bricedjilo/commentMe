<?php

namespace App\Models;

class User {

    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $reg_complete = 0;
    protected $active = 0;

    function __construct($firstname, $lastname, $email, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getFirstName() {
        return $this->firstname;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRegComplete() {
        return $this->reg_complete;
    }

    public function getActive() {
        return $this->active;
    }

    public function setFirstName($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRegComplete($reg_complete) {
        $this->reg_complete = $reg_complete;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
