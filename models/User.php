<?php

class User {
    public $username;
    private $password;
    private $table = "users";

    public function register(User $user){
        $fields = "username, password, first_name, last_name";
        $this->insert($this->table, $fields, $user);
    }

    public function login(User $user){

    }
} 