<?php
class Category extends MasterModel{
    private $category_id;
    private $name;
    private $table = "categories";

    public function __get($name) {
        return $this->$name;
    }

    public function setName($name){
        $this->name = strip_tags($name);
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(Category $category, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('Category', $key)){
                $category->$key = $value;
            }
        }
        return $category;
    }

    public function save(Category $category, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($category));
    }

    public function getCategory($id){
        $category = $this->selectOne($this->table, "category_id = '$id'");
        $category = $this->arrayToObject($this, $category);

        return $category;
    }

    public function getAllCategories(){
        $rows = $this->selectAll($this->table);
        foreach($rows as $row){
            $category = new Category();
            $category = $this->arrayToObject($category, $row);
            $categories[] = $category;
        }

        return $categories;
    }
} 