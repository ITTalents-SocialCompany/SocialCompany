<?php
class Post extends MasterModel{
    private $title;
    private $description;
    private $table = "posts";

    public function savePost(Post $post){
        $fields = "title, description";
        $this->insert($this->table, $fields, $post);
    }
}