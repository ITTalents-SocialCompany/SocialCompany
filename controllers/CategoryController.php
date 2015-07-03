<?php
class CategoryController extends MasterController{
    public function index($args){
        $id = $args[0];
        $category = new Category();
        $category->getCategory($id);
        $user = new User();
        $users = $user->getAllUsers();
        $this->renderView("category/index", array("category", "users"), array($category, $users));
    }

} 