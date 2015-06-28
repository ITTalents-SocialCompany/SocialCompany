<?php
class LikeComment extends MasterModel{
    private $comment_id;
    private $user_id;
    private $table = "likes_comments";

    public function __construct($comment_id = null, $user_id = null){
        parent::__construct();
        $this->setCommentId($comment_id);
        $this->setUserId($user_id);
    }

    public function __get($name) {
        return $this->$name;
    }

    public function setCommentId($comment_id){
        $this->comment_id = $comment_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(LikeComment $like_comment, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('LikeComment', $key)){
                $like_comment->$key = $value;
            }
        }
        return $like_comment;
    }

    public function save($fields){
        return $this->insert($this->table, $fields, $this->objectToArray($this));
    }

    public function unlike($comment_id, $user_id){
        $this->delete($this->table, "comment_id = $comment_id AND user_id = $user_id");
    }
}