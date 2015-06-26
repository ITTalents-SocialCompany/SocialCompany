<?php if(count($posts) > 0) foreach($posts as $post):?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $post->title?> --- <?= $post->author_id?></h3>
        </div>
        <div class="panel-body">

            <div class="well well-sm">
                <?= $post->body?>
            </div>
            <div class="col-md-6 col-md-offset-6"><p class="text-muted"><small>Posted by Username</small></p></div>
            <div class="col-md-4">
                <p><small>Like Comment</small> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></p>
            </div>
        </div>
    </div>
<?php endforeach;?>