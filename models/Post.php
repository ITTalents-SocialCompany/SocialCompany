<?php
class Post extends MasterModel{
    private $title;
    private $body;
    private $category_id;
    private $author_id;
    private $table = "posts";

    public function __construct($title = null, $body = null, $author_id = null){
        parent::__construct();
        $this->title = $title;
        $this->body = $body;
        $this->author_id = $author_id;
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function setTitle($title){
    	$this->title = $title;
    }
    
    public function setBody($body){
    	$this->body = $body;
    }

    public function setAuthorId($author_id){
        $this->author_id = $author_id;
    }

    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }

    public function savePost(Post $post, $fields){	
        return $this->insert($this->table, $fields, $this->objectToArray($post));
    }
    
    public function objectToArray(){
    	return get_object_vars($this);
    }
    
    public function arrayToObject(Post $post, $arr){
    	foreach ($arr as $key => $value)
    	{
    		if(property_exists('Post', $key)){
                $post->$key = $value;
    		}
    	}
    	return $post;
    }

    public function getAll($start, $where = ""){
        $rows = $this->selectAll($this->table, $where, "post_id DESC", "$start, 5");
        if(count($rows) > 0){
            foreach ($rows as $post){
                $posts[] = new Post($post['title'], $post['body'], $post['author_id']);
            }
            return $posts;
        }
    }
}