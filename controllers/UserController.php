<?php

class UserController extends MasterController{
    public function __construct(){}

    public function register(){
        $this->renderView("user/register");
    }

    public function registerPost($post){
        $fields = $this->takeFields($post);


        $user = new User();
        $error = $user->validate($post);
        if($error !== true){
            $this->renderView("user/register", array("user"), array($user), $error);
        }else{

            if($user->register($user, $fields) !== 0){
                $this->redirect("/user/login");
            }
            else{
                $this->renderView("user/register", array("user"), array($user), "Username is occupied!");
            }
        }
    }

    public function login(){
        $this->renderView("user/login");
    }

    public function loginPost($post){
        $user = new User();
        $error = $user->validate($post);
        if($error !== true){
            $this->renderView("user/login", array("user"), array($user), $error);
        }else{
        	$error = $user->validate($post);
            if($error == true){

	            if($user->login($user)){
	                $user_detail = new UserDetail();
	                if($user_detail->hasUserDetail()){
	                    $this->redirect("/profile/index");
	                }else{
	                    $this->redirect("/profile/edit");
	                }
	            }else{
	                $this->renderView("user/login", array("user"), array($user), "Username or password is wrong!");
	            }
            }else{
            	$this->redirect("/user/login");
            }
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
            $this->renderView("user/changePassword", null, null, "Old Password is wrong!");
        }
    }
} 