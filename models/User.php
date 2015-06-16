<?php

class User extends MasterModel{
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $user_id;
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

    public function register(User $user, $fields){
        $user->setPassword($this->hashPassword($user->password));
        return $this->insert($this->table, $fields, $user->objectToArray()) ? true : false;
    }

    public function login(User $user){
        if($res = $this->selectOne($this->table, "username = '$user->username'")){
            if (password_verify($user->password, $res['password'])) {
                $_SESSION['first_name'] = $res['first_name'];
                $_SESSION['id'] = $res['user_id'];
                return true;
            }else{
                return false;
            }
        }
    }

    public function hashPassword($password){
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function findByUsername($username){
        $arr = $this->selectOne($this->table, "username = '$username'");
        return $this->arrayToObject(new User(), $arr);
    }

    public function getUser($id){
        $user = $this->selectOne($this->table, "user_id = '$id'");
        $user = $this->arrayToObject($this, $user);

        return $user;
    }
} 