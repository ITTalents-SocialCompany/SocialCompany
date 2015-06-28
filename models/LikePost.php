<?php
class LikePost extends MasterModel{
    private $post_id;
    private $user_id;
    private $table = "likes_posts";

    public function __construct($post_id = null, $user_id = null){
        parent::__construct();
        $this->setPostId($post_id);
        $this->setUserId($user_id);
    }

    public function __get($name) {
        return $this->$name;
    }

    public function setPostId($post_id){
        $this->post_id = $post_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(LikePost $like_post, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('LikePost', $key)){
                $like_post->$key = $value;
            }
        }
        return $like_post;
    }

    public function save($fields){
        return $this->insert($this->table, $fields, $this->objectToArray($this));
    }

    public function unlike($post_id, $user_id){
        $this->delete($this->table, "post_id = $post_id AND user_id = $user_id");
    }
}