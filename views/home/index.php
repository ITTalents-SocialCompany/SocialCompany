<div class="row">
    <div class="list-group col-md-2 affix">
        <h3>Categories</h3>
        <?php foreach($categories as $category):?>
            <a href="/category/index/<?= $category->category_id?>" class="list-group-item">
                <?= $category->name?>
            </a>
        <?php endforeach;?>
    </div>
<div class="row col-md-offset-5" id="show_post_form">
    <a class="btn btn-primary" onclick="showPostForm();">Add Post</a>
</div>
<div class="list-group col-md-offset-8 col-md-3 affix" >
	<h3>Coming events</h3>
    <?php foreach($events as $event):
    	$time = explode("-",$event->event_time);
		$time = $time[2].".".$time[1];?>
	
        <a href="/event/show/<?= $event->event_id?>" class="list-group-item">
            <b><?= $time;?></b>&nbsp;&nbsp;<?= $event->title?>
        </a>
    <?php endforeach;?>
</div>
<br>
<form action="/post/savePost" method="POST" class="form-horizontal col-md-offset-3 col-md-5" id="post_form" enctype='multipart/form-data' hidden>
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title" required>
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body" required></textarea>
    </div>
    <div class="form-group">
        <select class="form-control input-sm" name="category_id" required>
            <?php foreach($categories as $category):?>
                <option value="<?= $category->category_id?>"><?= $category->name?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group" >
        <a class="btn btn-info btn-sm" onclick="tagUsers();">Tag Users</a>
        <a class="btn btn-success btn-sm" onclick="addPostImg();">Add Image</a>
    </div>
    <div class="form-group" id="select_tag_users" hidden>
        <select class="form-control input-sm" multiple="" name="tagged_users[]">
            <?php foreach($users as $user):?>
                <option value="<?= $user->user_id?>"><?= "$user->first_name $user->last_name"?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group" id="select_post_img" hidden>
        <div class="form-group">
            <div class="col-md-10">
                <input type="file" name="post_img_url">
            </div>
        </div>
    </div>
    <input type="hidden" name="author_id" value="<?= Auth::getId()?>">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</form>

<div class="col-md-offset-3 col-md-5" id="posts"></div>

<script src="/libs/js/index.js"></script>
