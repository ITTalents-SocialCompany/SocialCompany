<?php
class Auth{

    public static function getUserId(){
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