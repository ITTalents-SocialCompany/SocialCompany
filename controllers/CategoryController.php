<?php
class CategoryController extends MasterController{
    public function index($args){
        $id = $args[0];
        $category = new Category();
        $category->getCategory($id);
        $this->renderViewWithParams("category/index", array("category"), array($category));
    }

} 