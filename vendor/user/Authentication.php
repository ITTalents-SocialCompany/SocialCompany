<?php
class Auth{

    public static function getId(){
        return isset($_SESSION['id']) ? $_SESSION['id'] : false;
    }

    public static function isAdmin(){
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ? true : false;
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