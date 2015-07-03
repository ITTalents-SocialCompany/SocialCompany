<?php
class CommentController extends MasterController{

    public function saveComment($post){
        $fields = $this->takeFields($post);

        $comment = new Comment();
        $error = $comment->validate($post);
        if($error === true){
            $comment->save($comment, $fields);
        }
    }

    public function getAllComments($args){
        $id = $args[0];
        $comment = new Comment();
        $comments = $comment->getAllComments($id);
        $this->renderViewAjax("comment/index", array("comments"), array($comments));
    }

    public function likeComment($args){
        $comment_id = $args[0];
        $user_id = Auth::getId();
        $likeComment = new LikeComment();
        $likeComment->setCommentId($comment_id);
        $likeComment->setUserId($user_id);
        $likeComment->save("comment_id,user_id");
    }

    public function unlikeComment($args){
        $comment_id = $args[0];
        $user_id = Auth::getId();
        $likeComment = new LikeComment();
        $likeComment->unlike($comment_id, $user_id);
    }
} 