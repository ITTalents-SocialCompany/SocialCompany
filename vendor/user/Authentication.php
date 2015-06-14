<?php
class Auth extends MasterModel{
    private $table = "users";

    public function register(User $user, $fields){
        $user->setPassword($this->hashPassword($user->password));
        return $this->insert($this->table, $fields, $user->objectToArray());
    }

    public function login(User $user){
        if($res = $this->findByUsername($this->table, "$user->username")){
            if (password_verify($user->password, $res['password'])) {
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

    public function getUserId(){
        return isset($_SESSION['id']) ? $_SESSION['id'] : false;
    }

    public static function isLoggedIn(){
        return isset($_SESSION['id']) ? true : false;
    }

    public static function isAuthorized(){
        if(!Auth::isLoggedIn()){
            header("Location: /user/login");
        }
    }
} 