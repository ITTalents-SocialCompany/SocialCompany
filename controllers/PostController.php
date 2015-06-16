<?php
class PostController extends MasterController{
	public function savePost($post){
		$fields = $this->takeFields($post);
		
		$newPost = new Post();
		$newPost->setTitle($post['title']);
        $newPost->setBody($post['body']);
		
		$newPost->savePost($newPost, $fields);
	}
} 