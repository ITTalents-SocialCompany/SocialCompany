<?php
class UserData {
    private $user_id;
    private $username;
    private $first_name;
    private $last_name;
    private $is_approve;
    private $is_admin;
    private $soft_delete;

    public function __get($name) {
        return $this->$name;
    }

    public function arrayToObject(UserData $user, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('UserData', $key)){
                $user->$key = $value;
            }
        }
        return $user;
    }
} 