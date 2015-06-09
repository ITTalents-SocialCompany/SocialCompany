<?php

class UserController extends MasterController{

    public function register(){
        $this->renderView("user/register");
    }

    public function registerPost($post){
//        var_dump($post);
        $user = new User();
//        $user->username = $post["username"];
        var_dump(serialize($user));
//        $user->register($user);
    }

    public function login(){
        $this->renderView("user/login");
    }
} 