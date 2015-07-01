$(function() {
	$('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
});

function searchUser(value){
    if(value !== ""){
        value = "searchStr=" + value;
        $(document).ready(function(){
            $.post('/home/searchUser', value, function(result){
                $('#findUsers').show();
                $('#findUsers').html(result);
            });
        });
    }else{
        $('#findUsers').hide();
    }
}

function comment(id){
    if($('#post_'+id).is(':visible')){
        document.getElementById("post_"+id).setAttribute("hidden", "hidden");
    }else{
        document.getElementById("post_"+id).removeAttribute("hidden");
    }
}


function addComment(id){
    var element = document.getElementById("form_"+id).elements;
    var dataString = "";
    for(var i = 0; i < element.length; i++){
        dataString += element.item(i).name + "=" + element.item(i).value + "&";
    }
    $(document).ready(function(){
        $.post('/comment/saveComment', dataString, function(result){
            document.getElementById("form_"+id).reset();
            document.getElementById("post_"+id).setAttribute("hidden", "hidden");
            var numOfComments = parseInt($("#comment_num_"+id).html())+1;
            $("#comment_num_"+id).html(numOfComments);
        });
    });
}

function showComments(id){
//    console.log(id);
    $(document).ready(function(){
        $.get('/comment/getAllComments/'+id, function(result){
            $('#comments_'+id).toggle().html(result);
        });
    });
}

function like(post_id){
    $(document).ready(function(){
        $.get('/post/likePost/'+post_id, function(result){
            $('#'+post_id).hide();
            $('#unlike_'+post_id).show();
            var val = parseInt($('#like_'+post_id).html())+1;
            $('#like_'+post_id).html(val);
        })
    })
}

function unlike(post_id){
    $(document).ready(function(){
        $.get('/post/unlikePost/'+post_id, function(result){
            $('#'+post_id).show();
            $('#unlike_'+post_id).hide();
            var val = parseInt($('#like_'+post_id).html())-1;
            $('#like_'+post_id).html(val);
        })
    })
}

function likeComment(comment_id){
    $(document).ready(function(){
        $.get('/comment/likeComment/'+comment_id, function(result){
            console.log(result);
            $('#comment_like_'+comment_id).hide();
            $('#comment_unlike_'+comment_id).show();
            var val = parseInt($('#likeComment_'+comment_id).html())+1;
            $('#likeComment_'+comment_id).html(val);
        })
    })
}

function unlikeComment(comment_id){
    $(document).ready(function(){
        $.get('/comment/unlikeComment/'+comment_id, function(result){
            $('#comment_like_'+comment_id).show();
            $('#comment_unlike_'+comment_id).hide();
            var val = parseInt($('#likeComment_'+comment_id).html())-1;
            $('#likeComment_'+comment_id).html(val);
        })
    })
}

function showAddLanguages(){
    $(document).ready(function(){
        $("#add_languages").toggle();
    })
}






