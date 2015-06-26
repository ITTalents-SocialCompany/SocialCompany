<?php

class User extends MasterModel{
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $user_id;
    private $is_approve;
    private $soft_delete;
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
        return $this->insert($this->table, $fields, $user->objectToArray());
    }

    public function login(User $user){
        if($res = $this->selectOne($this->table, "username = '$user->username' and soft_delete IS NULL")){
            if (password_verify($user->password, $res['password'])) {
                $_SESSION['is_admin'] = $res['is_admin'];
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

    public function getUserDetail(){
        $user_detail = new UserDetail();
        $res = $this->selectOne($user_detail->table, "user_id = '$this->user_id'");
        $user_detail = $user_detail->arrayToObject($user_detail, $res);

        return $user_detail;
    }

    public function getAllUsers(){
        $users = array();
        $rows = $this->selectAll($this->table, "soft_delete IS NULL AND is_approve IS TRUE AND user_id <>".Auth::getId());
        foreach($rows as $row){
            $user = new User();
            $user = $this->arrayToObject($user, $row);
            $users[] = $user;
        }

        return $users;
    }

    public function approve($id){
        $fields = array("is_approve", "soft_delete");
        $data = array("is_approve"=> true, "soft_delete" => NULL);
        $this->update($this->table, $fields, $data, "user_id = '$id'");
    }

    public function soft_delete($id){
        $fields = array("is_approve", "soft_delete");
        $data = array("is_approve"=> false, "soft_delete" => date('Y-m-d H:i:s'));
//        var_dump($data);
        $this->update($this->table, $fields, $data, "user_id = '$id'");
    }
} 