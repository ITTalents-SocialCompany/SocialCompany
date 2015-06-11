<?php

class User extends MasterModel{
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $table = "users";

    public function __get($name) {
        return $this->$name;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }
} 