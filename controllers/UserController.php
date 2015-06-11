<?php

class UserController extends MasterController{
    private $auth;

    public function __construct(){
        $this->auth = new Auth();
    }

    public function register(){
        $this->renderView("user/register");
    }

    public function registerPost($post){
        $fields = $this->takeFields($post);

        $user = new User();
        $user->setUsername($post['username']);
        $user->setPassword($post['password']);
        $user->setFirstName($post['first_name']);
        $user->setLastName($post['last_name']);

        if($this->auth->register($user, $fields)){
            $this->redirect("/user/login");
        }
        else{
            $this->renderViewWithError("user/register", $post, "Username is occupied!");
        }
    }

    public function login(){
        $this->renderView("user/login");
    }

    public function loginPost($post){
        $user = new User();
        $user->setUsername($post['username']);
        $user->setPassword($post['password']);

        if($this->auth->login($user)){
            $this->redirect("/");
        }else{
            $this->renderViewWithError("user/login", $post, "Username or password is wrong!");
        }
    }

    public function logout(){
        session_destroy();
        $this->redirect("/user/login");
    }
} 