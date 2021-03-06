<div class="page-header">
    <h1><h1><?= $category->name?></h1></h1>
</div>

<div class="row" id="show_post_form">
    <div class="col-md-offset-5 col-md-1">
        <a class="btn btn-primary" onclick="showPostForm();">Add Post</a>
    </div>
</div>
<br>
<input type="hidden" id="category_id" value="<?= $category->category_id?>">
<form action="/post/savePost" method="POST" class="form-horizontal col-md-offset-3 col-md-5" id="post_form" hidden>
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body"></textarea>
    </div>

    <input type="hidden" name="category_id" value="<?= $category->category_id?>">

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

    var id = document.getElementById("category_id").value;
    var count = getAllPosts(0, id);

    function getAllPosts(count, id) {
        var xhr = new XMLHttpRequest();
        var url = "http://socialcompany/post/allPostAjax/" + count + "/" + id;

        xhr.open("GET",url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if(xhr.responseText !== ""){
                    document.getElementById("posts").innerHTML += xhr.responseText;
                }
            }
        };
        xhr.send(null);
        return count+5;
    }

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 20) {

            count = getAllPosts(count, id);
        }
    });
</script>