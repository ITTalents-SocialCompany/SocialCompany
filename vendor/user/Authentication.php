<?php
class Auth{

    public static function getId(){
        if(isset($_SESSION['logged_user'])){
            $user = unserialize($_SESSION['logged_user']);
            return $user->user_id;
        }
        return false;
    }

    public static function getFirstName(){
        if(isset($_SESSION['logged_user'])){
            $user = unserialize($_SESSION['logged_user']);
            return $user->first_name;
        }
        return false;
    }

    public static function isAdmin(){
        if(isset($_SESSION['logged_user'])){
            $user = unserialize($_SESSION['logged_user']);
            return $user->is_admin ? true : false;
        }
    }

    public static function isLoggedIn(){
        if(isset($_SESSION['logged_user'])){
            $user = unserialize($_SESSION['logged_user']);
            return true;
        }
        return false;
    }

    public static function isAuthorized(){
        if(!Auth::isLoggedIn()){
            header("Location: /user/login");
        }
    }
} 