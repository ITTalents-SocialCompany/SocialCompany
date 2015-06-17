<form action="/post/savePost" method="POST" class="form-horizontal col-md-offset-3 col-md-5">
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body"></textarea>
    </div>
    <input type="hidden" name="author_id" value="<?= Auth::getId()?>">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</form>

<div class="col-md-offset-3 col-md-5" id="posts">

</div>

<script>
    var count = getAllPosts(0);

    function getAllPosts(count) {
        var xhr = new XMLHttpRequest();
        var url = "http://socialcompany/post/allPostAjax/"+ count;

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
            count = getAllPosts(count);
        }
    });
</script>