<form action="/post/editPost" method="POST" class="form-horizontal col-md-offset-3 col-md-5" id="post_form">
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title" value="<?= $post->title?>">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body"><?= $post->body?></textarea>
    </div>
    <input type="hidden" name="post_id" value="<?= $post->post_id?>">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</form>