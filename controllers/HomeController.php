<?php
class HomeController extends MasterController{
    public function __construct(){
        Auth::isAuthorized();
    }

    public function index(){
        $category = new Category();
        $categories = $category->getAllCategories();
        $user = new User();
        $users = $user->getAllUsers();
        $this->renderViewWithParams("home/index", array("categories", "users"), array($categories, $users));
    }

} 