<?php

class UserController extends MasterController{
    private $auth;
    private $userInfo;

    public function __construct(){
        $this->auth = new Auth();
        $this->userInfo = new UserInfo();
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
            $user->setPassword($post['password']);
            if($this->auth->login($user)){
                $this->redirect("/profile/index");
            }
        }
        else{
            $this->renderViewWithError("user/register", "user", $user, "Username is occupied!");
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
            if($this->userInfo->hasProfile()){
                $this->redirect("/profile/index");
            }else{
                $this->redirect("/profile/edit");
            }
        }else{
            $this->renderViewWithError("user/login", "user", $user, "Username or password is wrong!");
        }
    }

    public function logout(){
        session_destroy();
        $this->redirect("/user/login");
    }
} 