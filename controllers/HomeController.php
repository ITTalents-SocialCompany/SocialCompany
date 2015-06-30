<?php
class HomeController extends MasterController{
    public function __construct(){
        Auth::isAuthorized();
    }

    public function index(){
    	$event = new Event();
    	$event = $event->getAllEvents("0,10");
        $category = new Category();
        $categories = $category->getAllCategories();
        $user = new User();
        $users = $user->getAllUsers();
        $this->renderViewWithParams("home/index", array("categories", "users","events"), array($categories, $users, $event));
    }

    public function searchUser($post){
        $user = new User();
        $users = $user->searchUser($post['searchStr']);
//var_dump($users);
        $this->renderViewAjax("user/usersFind", array("users"), array($users));
    }
} 