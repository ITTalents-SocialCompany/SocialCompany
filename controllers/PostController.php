<?php
class PostController extends MasterController{
	public function savePost($post){
		$fields = $this->takeFields($post);
		
		$newPost = new Post();
		$newPost->setTitle($post['title']);
        $newPost->setBody($post['body']);
        $newPost->setAuthorId($post['author_id']);
		
		if($newPost->savePost($newPost, $fields)){
            $this->redirect("/");
        }else{
            echo "Error!";
        }
	}

    public function allPostAjax($args){
        $start = $args[0];
        $post = new Post();
        $posts = $post->getAll($start);
//        var_dump($posts);
        $this->renderViewAjax("home/posts", "posts", $posts);
    }
} 