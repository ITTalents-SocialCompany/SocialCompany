<?php

class UserController extends MasterController{
    public function __construct(){}

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

        if($user->register($user, $fields)){
            $user->setPassword($post['password']);
            if($user->login($user)){
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

        if($user->login($user)){
            $user_detail = new UserDetail();
            if($user_detail->hasUserDetail()){
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