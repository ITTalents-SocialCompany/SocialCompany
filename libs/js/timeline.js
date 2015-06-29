var count = getAllPosts(0);

function getAllPosts(count) {
    id = document.getElementById("id").value;
    $(document).ready(function(){
        $.get('/profile/timelineAjax/'+id+'/'+count, function(result){
            var posts = $('#posts').html();
            $('#posts').html(posts+result);
        });
    });
    return count+2;
}

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() - 20) {
        count = getAllPosts(count);
    }
});