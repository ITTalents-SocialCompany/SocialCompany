<?php
class Comment extends MasterModel{
    private $comment_id;
    private $body;
    private $post_id;
    private $author_id;
    private $author;
    private $numberOfLikes;
    private $isLike;
    private $table = "comments";

    public function __construct($comment_id = null ,$body = null, $numberOfLikes = null, $isLike = null){
        parent::__construct();
        $this->comment_id = $comment_id;
        $this->body = $body;
        $this->numberOfLikes = $numberOfLikes;
        $this->isLike = $isLike;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function setBody($body){
        $this->body = $body;
    }

    public function setPostId($post_id){
        $this->post_id = $post_id;
    }

    public function setAuthorId($author_id){
        $this->author_id = $author_id;
    }

    public function addAuthor(User $user){
        $this->author = $user;
    }

    public function objectToArray(){
        return get_object_vars($this);
    }

    public function arrayToObject(Comment $comment, $arr){
        foreach ($arr as $key => $value)
        {
            if(property_exists('Comment', $key)){
                $comment->$key = $value;
            }
        }
        return $comment;
    }

    public function save(Comment $comment, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($comment));
    }

    public function getAllComments($id){
        $rows = $this->selectAll("comment_view", "post_id = $id");
        if(count($rows) > 0){
            foreach ($rows as $row){
                $numberOfLikes =  $this->selectOne("likes_comments", "comment_id = ".$row['comment_id'], "count(like_id) as count", "comment_id");
                $isLikeWhere = "comment_id = " . $row['comment_id'] . " AND user_id = " . Auth::getId();
                $isLike = $this->selectOne("likes_comments", $isLikeWhere);
                if($isLike !== false){
                    $isLike = true;
                }
                $comment = new Comment($row['comment_id'], $row['body'], $numberOfLikes['count'], $isLike);
                $user = new User();
                $user->arrayToObject($user, $row);
                $user_detail = new UserDetail();
                $user_detail->arrayToObject($user_detail, $row);
                $user->addUserDetail($user_detail);
                $comment->addAuthor($user);
                $comments[] = $comment;
            }
            return $comments;
        }
    }
} 