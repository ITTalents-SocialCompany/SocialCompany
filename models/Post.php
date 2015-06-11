<?php
class Post extends MasterModel{
    private $title;
    private $body;
    private $table = "posts";

    public function __get($name) {
        return $this->$name;
    }

    public function savePost(Post $post){
        $fields = "title, description";
        $this->insert($this->table, $fields, $post);
    }
}