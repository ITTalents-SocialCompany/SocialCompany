<?php

class User extends MasterModel{
    private $username;
    private $password;
    private $first_name;
    private $last_name;

    public function __get($name) {
        return $this->$name;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }

    public function setLastName($last_name){
        $this->last_name = $last_name;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(User $user, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('User', $key) && strcmp($key, "password") !== 0){
                $user->$key = $value;
            }
        }
        return $user;
    }
} 