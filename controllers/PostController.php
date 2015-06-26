<?php
class PostController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }

	public function savePost($post){
        $tagged_users = array();
        if(isset($post['tagged_users'])){
            $tagged_users = $post["tagged_users"];
            unset($post['tagged_users']);
        }
        $tagged_users[] = Auth::getId();

		$fields = $this->takeFields($post);
		var_dump($post);
		$newPost = new Post();
		$newPost->setTitle($post['title']);
        $newPost->setBody($post['body']);
        $newPost->setCategoryId($post['category_id']);
        $newPost->setAuthorId($post['author_id']);
//        var_dump($tagged_users);
        $post_id = $newPost->savePost($newPost, $fields);

		if($post_id !== 0){
            foreach($tagged_users as $tagged_user){
                $post_to_user = new PostToUser($post_id, $tagged_user);
                $post_to_user->save("post_id,user_id");
            }
            $this->redirect("/");
        }else{
            echo "Error!";
        }
	}

    public function allPostAjax($args){
        $start = $args[0];
        $post = new Post();
        if(count($args) > 1){
            $id = $args[1];
            $posts = $post->getAll($start, "category_id = '$id'");
        }else{
            $posts = $post->getAll($start);
        }
        $this->renderViewAjax("home/posts", "posts", $posts);
    }
} 