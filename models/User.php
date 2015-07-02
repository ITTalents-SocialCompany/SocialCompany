<?php

class User extends MasterModel{
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $user_id;
    private $is_approve;
    private $is_admin;
    private $soft_delete;
    private $user_detail;
    private $table = "users";

    public function __get($name) {
        return $this->$name;
    }

    public function validate($post){
        try{
            $this->setUsername($post['username']);
            $this->setPassword($post['password']);
            if(isset($post['first_name'])){
                $this->setFirstName($post['first_name']);
            }
            if(isset($post['last_name'])){
                $this->setLastName($post['last_name']);
            }
            return true;
        }catch (InvalidArgumentException $e){
            return $e->getMessage();
        }
    }

    public function setUsername($username){
        if(preg_match('/^[a-zA-Z][a-zA-Z0-9\_\-]+/', $username) === 1){
            $this->username = $username;
        }else{
            throw new InvalidArgumentException("Username must be string!");
        }
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setFirstName($first_name){
        if(preg_match('/[a-zA-Z]+/',$first_name) === 1){
            $this->first_name = $first_name;
        }else{
            throw new InvalidArgumentException("First name must be string!");
        }
    }

    public function setLastName($last_name){
        if(preg_match('/[a-zA-Z]+/',$last_name) === 1){
            $this->last_name = $last_name;
        }else{
            throw new InvalidArgumentException("Last name must be string!");
        }
    }

    public function addUserDetail(UserDetail $user_detail){
        $this->user_detail = $user_detail;
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
        if($res = $this->selectOne($this->table, "username = '$user->username' and soft_delete IS NULL AND is_approve IS TRUE")){
            if (password_verify($user->password, $res['password'])) {
                $newUserData = new UserData();
                $newUserData->arrayToObject($newUserData, $res);
                $_SESSION['logged_user'] = serialize($newUserData);
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

        return $this->arrayToObject($this, $user);
    }

    public function getUserDetail(){
        $user_detail = new UserDetail();
        $res = $this->selectOneWithJoin($user_detail->table, array("genders"), array("gender_id"), array("u.gender_id"),
                               "user_id = '$this->user_id'");
        if($res !== false){
            $user_detail = $user_detail->arrayToObject($user_detail, $res);

            $this->user_detail = $user_detail;
        }
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

    public function getAllUsersForAdmin(){
        $users = array();
        $rows = $this->selectAll($this->table);
        foreach($rows as $row){
            $user = new User();
            $user = $this->arrayToObject($user, $row);
            $users[] = $user;
        }

        return $users;
    }

    public function getAllUsersForAdminTeams(){
        $users = array();
        $rows = $this->selectAll($this->table, "is_approve IS TRUE AND soft_delete IS NULL");
        foreach($rows as $row){
            $user = new User();
            $user = $this->arrayToObject($user, $row);
            $users[] = $user;
        }

        return $users;
    }

    public function getAllUsersDeleted(){
        $users = array();
        $rows = $this->selectAll($this->table, "soft_delete IS NOT NULL");
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
        $this->update($this->table, $fields, $data, "user_id = '$id'");
    }

    public function makeAdmin($id){
        $fields = array("is_admin");
        $data = array("is_admin"=> true);
        $this->update($this->table, $fields, $data, "user_id = '$id'");
    }

    public function searchUser($searchStr){
        $rows = $this->selectAllWithJoins($this->table, array("user_details"), array("user_id"), array("u.user_id"),
                        "first_name LIKE '$searchStr%' AND is_approve IS NOT FALSE", "u.user_id, username, first_name, last_name, profile_img_url", "", "0, 5");
        if(count($rows) > 0){
            foreach($rows as $row){
                $user = new User();
                $user = $this->arrayToObject($user, $row);
                $user_detail = new UserDetail();
                $user_detail->arrayToObject($user_detail, $row);
                $user->addUserDetail($user_detail);
                $users[] = $user;
            }

            return $users;
        }
    }

    public function changePassword($passwords){
        $user_id = Auth::getId();
        if($res = $this->selectOne($this->table, "user_id = $user_id")){
            if (password_verify($passwords['old_password'], $res['password'])) {
                $newPassword = $this->hashPassword($passwords['new_password']);
                $this->update($this->table, array("password"), array("password" => $newPassword), "user_id = $user_id");
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
} 