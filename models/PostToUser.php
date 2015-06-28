<?php
class PostToUser extends MasterModel{
    private $post_id;
    private $user_id;
    private $table = "posts_to_users";

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

    public function arrayToObject(PostToUser $post_to_user, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('PostToUser', $key)){
                $post_to_user->$key = $value;
            }
        }
        return $post_to_user;
    }

    public function save($fields){
        return $this->insert($this->table, $fields, $this->objectToArray($this));
    }

    public function getAllPostForUser($id, $start){
        $objects = array();
        $fields = "p.post_id ,title, body, author_id, username";
        $rows = $this->selectAllWithJoins($this->table, array("posts", "users"),
                        array("post_id", "user_id"), array("p.post_id", "po.author_id"), "user_id = $id", $fields, "post_id DESC", "$start , 2");
        if(count($rows) > 0){
            foreach ($rows as $row){
                $post = new Post($row['post_id'], $row['title'], $row['body'], $row['author_id']);
                $user = new User();
                $user->arrayToObject($user, $row);
                $post->addAuthor($user);
                $posts[] = $post;
            }
            return $posts;
        }
    }
} 