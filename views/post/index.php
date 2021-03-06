<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="/post/index/<?= $post->post_id?>"><?= $post->title?></a>
            <?php if($post->author_id == Auth::getId()):?>
                <a href="/post/edit/<?= $post->post_id?>">
                    <span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span>
                </a>
            <?php endif;?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="text-center">
            <?php if($post->post_img_url): ?>
                <img src="<?= $post->post_img_url?>" width="40%">
            <?php endif;?>
        </div>
        <div class="well well-sm">
            <?= $post->body?>
        </div>
        <div class="col-md-2 col-md-offset-10">
            <p class="text-muted">
                <small>Posted by <?= $post->author->username?></small>
            </p>
        </div>
        <div class="col-md-2">
            <small>
                <?php if(!$post->isLike):?>
                    <a id="<?= $post->post_id?>" onclick="like(this.id)">
                        Like
                    </a>
                    <a id="unlike_<?= $post->post_id?>" onclick="unlike(<?= $post->post_id?>)" hidden>
                        Unlike
                    </a>
                <?php else: ?>
                    <a id="<?= $post->post_id?>" onclick="like(this.id)" hidden>
                        Like
                    </a>
                    <a id="unlike_<?= $post->post_id?>" onclick="unlike(<?= $post->post_id?>)">
                        Unlike
                    </a>
                <?php endif;?>
                <a id="<?= $post->post_id?>" onclick="comment(this.id)">Comment</a>
            </small>
        </div>
        <div class="col-md-offset-8 col-md-2">
<!--            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>-->
            <small>
                <span id="like_<?= $post->post_id?>"><?= $post->numberOfLikes?></span> Likes
            </small>
            <a id="<?= $post->post_id?>" onclick="showComments(this.id)">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span><small> <?= $post->numberOfComments?></small>
            </a>
        </div>
    </div>
    <div class="row" id="post_<?= $post->post_id?>" hidden="hidden">
        <form class="form-horizontal col-md-offset-1 col-md-10" id="form_<?= $post->post_id?>">
            <div class="form-group">
                <textarea class="form-control input-sm" rows="2" name="body" id="textArea" placeholder="Type a body"></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?= $post->post_id?>">
            <input type="hidden" name="author_id" value="<?= Auth::getId()?>">
            <div class="form-group">
                <a onclick="addComment(<?= $post->post_id?>)" class="btn btn-primary btn-xs">Comment</a>
            </div>
        </form>
    </div>
    <div class="panel-body comments" id="comments_<?= $post->post_id?>" hidden></div>
</div>

