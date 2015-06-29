<div class="list-group col-md-2 affix">
    <?php foreach($categories as $category):?>
        <a href="/category/index/<?= $category->category_id?>" class="list-group-item">
            <?= $category->name?>
        </a>
    <?php endforeach;?>
</div>

<div class="row col-md-offset-5" id="show_post_form">
    <a class="btn btn-primary" onclick="showPostForm();">Add Post</a>
</div>
<br>
<form action="/post/savePost" method="POST" class="form-horizontal col-md-offset-3 col-md-5" id="post_form" hidden>
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body"></textarea>
    </div>
    <div class="form-group">
        <select class="form-control input-sm" name="category_id">
            <?php foreach($categories as $category):?>
                <option value="<?= $category->category_id?>"><?= $category->name?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group" id="btn_tag_users">
        <a class="btn btn-info btn-sm" onclick="tagUsers();">Tag Users</a>
    </div>
    <div class="form-group" id="select_tag_users" hidden>
        <select class="form-control input-sm" multiple="" name="tagged_users[]">
            <?php foreach($users as $user):?>
                <option value="<?= $user->user_id?>"><?= "$user->first_name $user->last_name"?></option>
            <?php endforeach;?>
        </select>
    </div>
    <input type="hidden" name="author_id" value="<?= Auth::getId()?>">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</form>

<div class="col-md-offset-3 col-md-5" id="posts">

</div>

<script>
    function showPostForm(){
        document.getElementById("post_form").removeAttribute("hidden");
        document.getElementById("show_post_form").setAttribute("hidden", "hidden");
    }

    function tagUsers(){
        document.getElementById("select_tag_users").removeAttribute("hidden");
        document.getElementById("btn_tag_users").setAttribute("hidden", "hidden");
    }

    var count = getAllPosts(0);

    function getAllPosts(count) {
        $(document).ready(function(){
            $.get('/post/allPostAjax/'+count, function(result){
                var posts = $('#posts').html();
                $('#posts').html(posts+result);
            });
        });
        return count+5;
    }

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 20) {
            count = getAllPosts(count);
        }
    });
</script>