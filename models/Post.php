<?php
class Post extends MasterModel{
    private $title;
    private $body;
    private $table = "posts";

    public function __get($name) {
        return $this->$name;
    }
    
    public function setTitle($title){
    	$this->title = $title;
    }
    
    public function setBody($body){
    	$this->body = $body;
    }

    public function savePost(Post $post, $fields){	
        $this->insert($this->table, $fields, $this->objectToArray($post));
    }
    
    public function objectToArray(){
    	return get_object_vars($this);
    }
    
    public function arrayToObject(Post $post, $arr){
    	foreach ($arr as $key => $value)
    	{
    		if(property_exists('Post', $key)){
    			$user->$key = $value;
    		}
    	}
    	return $user;
    }
}