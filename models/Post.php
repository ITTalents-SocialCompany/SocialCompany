<?php
class Post extends MasterModel{
    private $post_id;
    private $title;
    private $body;
    private $category_id;
    private $author_id;
    private $author;
    private $numberOfComments;
    private $numberOfLikes;
    private $isLike;
    private $table = "posts";

    public function __construct($post_id = null, $title = null, $body = null, $author_id = null,
                                $numberOfComments = null, $numberOfLikes = null, $isLike = null){
        parent::__construct();
        $this->post_id = $post_id;
        $this->title = $title;
        $this->body = $body;
        $this->author_id = $author_id;
        $this->numberOfComments = $numberOfComments;
        $this->numberOfLikes = $numberOfLikes;
        $this->isLike = $isLike;
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

    public function addAuthor(User $user){
        $this->author = $user;
    }

    public function savePost(Post $post, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($post));
    }

    public function change($post, $fields, $id){
        return $this->update($this->table, $fields, $post, "post_id = '$id' AND author_id = " . Auth::getId());
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

    public function getOne(Post $post, $id){
        $postArr = $this->selectOne($this->table, "post_id = $id");
        return $this->arrayToObject($post, $postArr);
    }

    public function getPostInfo($id){
        $row = $this->selectOneWithJoin($this->table, array("users"), array("user_id"), array("p.author_id"), "post_id = $id");
        $numberOfComments =  $this->selectOne("comments", "post_id = ".$row['post_id'], "count(comment_id) as count", "post_id");
        $numberOfLikes =  $this->selectOne("likes_posts", "post_id = ".$row['post_id'], "count(like_id) as count", "post_id");
        $isLikeWhere = "post_id = " . $row['post_id'] . " AND user_id = " . Auth::getId();
        $isLike = $this->selectOne("likes_posts", $isLikeWhere);
        if($isLike !== false){
            $isLike = true;
        }
        $post = new Post($row['post_id'], $row['title'], $row['body'], $row['author_id'],
            $numberOfComments['count'], $numberOfLikes['count'], $isLike);
        $user = new User();
        $user->arrayToObject($user, $row);
        $post->addAuthor($user);
//        var_dump($post);
        return $post;
    }

    public function getAll($start, $where = ""){
        $fields = "*";
        $rows = $this->selectAllWithJoins($this->table, array("users"), array("user_id"), array("p.author_id"),
                                            $where, $fields, "post_id DESC", "$start, 5");
        if(count($rows) > 0){
            foreach ($rows as $row){
                $numberOfComments =  $this->selectOne("comments", "post_id = ".$row['post_id'], "count(comment_id) as count", "post_id");
                $numberOfLikes =  $this->selectOne("likes_posts", "post_id = ".$row['post_id'], "count(like_id) as count", "post_id");
                $isLikeWhere = "post_id = " . $row['post_id'] . " AND user_id = " . Auth::getId();
                $isLike = $this->selectOne("likes_posts", $isLikeWhere);
                if($isLike !== false){
                    $isLike = true;
                }
                $post = new Post($row['post_id'], $row['title'], $row['body'], $row['author_id'],
                                $numberOfComments['count'], $numberOfLikes['count'], $isLike);
                $user = new User();
                $user->arrayToObject($user, $row);
                $post->addAuthor($user);
                $posts[] = $post;
            }
            return $posts;
        }
    }

}