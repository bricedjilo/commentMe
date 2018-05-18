<?php

namespace App\Models;

class User {

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $reg_complete = 0;
    protected $active = 0;
    protected $role;
    protected $created_at;
    protected $updated_at;


    public function __construct() { }

    public static function withProperties($firstname, $lastname, $email, $password) {
        $instance = new self();
        $instance->firstname = $firstname;
        $instance->lastname = $lastname;
        $instance->email = $email;
        $instance->password = $password;
    }

    public function getId() {
        return $this->id;
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

    public function getRole() {
        return $this->role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getPassword() {
        return $this->password;
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

    public function setRole($role) {
        $this->role = $role;
    }

    public function toArray() {
        return get_object_vars($this);
    }

}
