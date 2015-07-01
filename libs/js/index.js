function showPostForm(){
    $('#post_form').toggle();
//    document.getElementById("show_post_form").setAttribute("hidden", "hidden");
}

function tagUsers(){
    $('#select_tag_users').toggle();
}

function addPostImg(){
    $('#select_post_img').toggle();
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
    if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
        count = getAllPosts(count);
    }
});