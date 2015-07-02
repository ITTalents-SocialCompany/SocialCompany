<?php

class UserController extends MasterController{
    public function __construct(){}

    public function register(){
        $this->renderView("user/register");
    }

    public function registerPost($post){
        $fields = $this->takeFields($post);

        try{
            $user = new User();
            $user->setUsername($post['username']);
            $user->setPassword($post['password']);
            $user->setFirstName($post['first_name']);
            $user->setLastName($post['last_name']);
        }catch (Exception $e){
            $this->renderViewWithParams("user/register", array("user"), array($user), "Invalid values!");
        }

        if($user->register($user, $fields) !== 0){
            $this->redirect("/user/login");
        }
        else{
            $this->renderViewWithParams("user/register", array("user"), array($user), "Username is occupied!");
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
            $this->renderViewWithParams("user/login", array("user"), array($user), "Username or password is wrong!");
        }
    }

    public function logout(){
        session_destroy();
        $this->redirect("/user/login");
    }

    public function changePassword(){
        $this->renderView("user/changePassword");
    }

    public function changePasswordPost($post){
        $user = new User();
        if($user->changePassword($post)){
            session_destroy();
            $this->redirect('/user/login');
        }else{
            $this->renderViewWithError("user/changePassword", null, null, "Old Password is wrong!");
        }
    }
} 