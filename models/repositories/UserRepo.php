<?php

class UserRepo extends MasterModel{
    protected $table = "users";

    protected function register(User $user){
        $query = "INSERT INTO $this->table (username, password, first_name, last_name) VALUES('".$user->getUsername."',
        '".$user->getPassword."', '".$user->getFirstName."', '".$user->getLastName."')";
        $this->insert($query);
    }
} 