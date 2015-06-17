<?php if(count($posts) > 0) foreach($posts as $post):?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $post->title?> --- <?= $post->author_id?></h3>
        </div>
        <div class="panel-body">
            <?= $post->body?>
        </div>
    </div>
<?php endforeach;?>