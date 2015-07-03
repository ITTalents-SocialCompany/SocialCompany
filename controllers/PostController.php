<?php
class PostController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }

    public function index($args){
        $id = $args[0];
        $post = new Post();
        $post = $post->getPostInfo($id);
        $this->renderView("post/index", array("post"), array($post));
    }

	public function savePost($post){
        $tagged_users = array();
        if(isset($post['tagged_users'])){
            $tagged_users = $post["tagged_users"];
            unset($post['tagged_users']);
        }
        $usersToNotify = $tagged_users;
        $tagged_users[] = Auth::getId();

        $newPost = new Post();
        $error = $newPost->validate($post);
        if($error === true){

            $fields = $this->takeFields($post);
            $folder = "/storage/posts/";

            if(strcmp($_FILES['post_img_url']['name'], "") !== 0){
                $fields .= ",post_img_url";
                $filenamePost = $_FILES['post_img_url']['tmp_name'];
                $realFilenameProfile = $_FILES['post_img_url']['name'];
                $postFilePath = "/storage/posts/". substr($post['title'], 0, 10) ."_$realFilenameProfile";
                $newPost->setPostImg($postFilePath);
            }

            $post_id = $newPost->savePost($newPost, $fields);

            if($post_id !== 0){
                foreach($tagged_users as $tagged_user){
                    $post_to_user = new PostToUser($post_id, $tagged_user);
                    $post_to_user->save("post_id,user_id");
                }
                foreach ($usersToNotify as $userToNotify){
                	$postNotification = new Notification($userToNotify, $post_id, "0");
                	$postNotification->savePostNotification("user_id,post_id,is_seen");
                }
                if(strcmp($_FILES['post_img_url']['name'], "") !== 0){
                    $this->saveImg($filenamePost, $postFilePath, $folder);
                }
                $this->redirect("/");
            }
        }else{
            $this->redirect("/");
        }
	}

    public function edit($args){
        $id = $args[0];
        $post = new Post();
        $post->getOne($post, $id);
        $this->renderView("post/edit", array("post"), array($post));
    }

    public function editPost($post){
        $id = $post['post_id'];
        unset($post['post_id']);

        $fields = array('title', 'body');

        $changePost = new Post();
        $error = $changePost->validate($post);
        if($error === true){
            $changePost->setTitle($post['title']);
            $changePost->setBody($post['body']);
            if($changePost->change($post, $fields, $id)){
                $this->redirect("/");
            }
        }else{
            $changePost->getOne($changePost, $id);
            $this->renderView("post/edit", array("post"), array($changePost), "$error");
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
        $this->renderViewAjax("home/posts", array("posts"), array($posts));
    }

    public function likePost($args){
        $post_id = $args[0];
        $user_id = Auth::getId();
        $likePost = new LikePost();
        $likePost->setPostId($post_id);
        $likePost->setUserId($user_id);
        $likePost->save("post_id,user_id");
    }

    public function unlikePost($args){
        $post_id = $args[0];
        $user_id = Auth::getId();
        $likePost = new LikePost();
        $likePost->unlike($post_id, $user_id);
    }
} 