<?php if(count($comments) > 0) foreach($comments as $comment):?>
    <div class="comment_show">
        <img src="<?= $comment->author->user_detail->profile_img_url ?
            $comment->author->user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="30" height="30">
        <?php if($comment->author->user_id == Auth::getId()):?>
        <a href="/profile/index">
        <?php else: ?>
        <a href="/profile/user/<?= $comment->author->username?>">
        <?php endif;?>
            <?= $comment->author->first_name." ".$comment->author->last_name?>
        </a>
        <small class="pull-right">
            <?php if(!$comment->isLike):?>
                <a id="comment_like_<?= $comment->comment_id?>" onclick="likeComment(<?= $comment->comment_id?>)">
                    Like
                </a>
                <a id="comment_unlike_<?= $comment->comment_id?>" onclick="unlikeComment(<?= $comment->comment_id?>)" hidden>
                    Unlike
                </a>
            <?php else: ?>
                <a id="comment_like_<?= $comment->comment_id?>" onclick="likeComment(<?= $comment->comment_id?>)" hidden>
                    Like
                </a>
                <a id="comment_unlike_<?= $comment->comment_id?>" onclick="unlikeComment(<?= $comment->comment_id?>)">
                    Unlike
                </a>
            <?php endif;?>
            <a id="likeComment_<?= $comment->comment_id?>"><?= $comment->numberOfLikes?></a>
        </small>
        <p class="comment-body"><?= $comment->body?></p>
    </div>
    <hr>
<?php endforeach;?>
