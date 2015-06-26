<?php
class HomeController extends MasterController{
    public function __construct(){
        Auth::isAuthorized();
    }

    public function index(){
        $category = new Category();
        $categories = $category->getAllCategories();
        $this->renderViewWithParams("home/index", array("categories"), array($categories));
    }

} 