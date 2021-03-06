<?php
class Post extends MasterModel{
    private $post_id;
    private $title;
    private $body;
    private $category_id;
    private $author_id;
    private $post_img_url;
    private $author;
    private $numberOfComments;
    private $numberOfLikes;
    private $isLike;
    private $table = "posts";

    public function __construct($post_id = null, $title = null, $body = null, $author_id = null, $post_img_url = null,
                                $numberOfComments = null, $numberOfLikes = null, $isLike = null){
        parent::__construct();
        $this->post_id = $post_id;
        $this->title = $title;
        $this->body = $body;
        $this->author_id = $author_id;
        $this->post_img_url = $post_img_url;
        $this->numberOfComments = $numberOfComments;
        $this->numberOfLikes = $numberOfLikes;
        $this->isLike = $isLike;
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function setTitle($title){
        if(strcmp($title, "") !== 0){
            $this->title = strip_tags($title);
        }else{
            throw new InvalidArgumentException("Title must be required!");
        }
    }
    
    public function setBody($body){
        if(strcmp($body, "") !== 0){
            $this->body = strip_tags($body);
        }else{
            throw new InvalidArgumentException("Body must be required!");
        }
    }

    public function setAuthorId($author_id){
        $this->author_id = $author_id;
    }

    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }

    public function setPostImg($post_img_url){
        $this->post_img_url = $post_img_url;
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

    public function validate($post){
        try{
            $this->setTitle($post['title']);
            $this->setBody($post['body']);
            if(isset($post['category_id'])){
                $this->setCategoryId($post['category_id']);
            }
            if(isset($post['category_id'])){
                $this->setAuthorId($post['author_id']);
            }
            return true;
        }catch (InvalidArgumentException $e){
            return $e->getMessage();
        }
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
        $post = new Post($row['post_id'], $row['title'], $row['body'], $row['author_id'], $row['post_img_url'],
            $numberOfComments['count'], $numberOfLikes['count'], $isLike);
        $user = new User();
        $user->arrayToObject($user, $row);
        $post->addAuthor($user);
//        var_dump($post);
        return $post;
    }

    public function getAll($start, $where = ""){
        $fields = "*";
        $rows = $this->selectAll("posts_view", $where, "", $fields, "$start, 5");
        if(count($rows) > 0){
            foreach ($rows as $row){
                $isLikeWhere = "post_id = " . $row['post_id'] . " AND user_id = " . Auth::getId();
                $isLike = $this->selectOne("likes_posts", $isLikeWhere);
                if($isLike !== false){
                    $isLike = true;
                }
                $post = new Post($row['post_id'], $row['title'], $row['body'], $row['author_id'], $row['post_img_url'],
                                $row['numOfComments'], $row['numOfLikes'], $isLike);
                $user = new User();
                $user->arrayToObject($user, $row);
                $post->addAuthor($user);
                $posts[] = $post;
            }
            return $posts;
        }
    }

}