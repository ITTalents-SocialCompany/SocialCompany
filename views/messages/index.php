<div class="well col-md-offset-1 col-md-10">
	<div class="row">
		<div id="chatrooms" class="list-group col-md-4" style="height: 430px; overflow:auto;">
		 	<img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait .. 
		</div>
        <div class="list-group col-md-8">
            <h3 class="text-center" id="chat_name"></h3>
            <div id="chatlog" class="col-md-12" style="height: 450px; overflow:auto;">
                <img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait ..
            </div>
            <form  id="chatlogForm" class="form-horizontal col-md-offset-0 col-md-12" hidden>
                <input type="hidden" name="chatroom_id" id="chatroom_id" />
                <div class="form-group">
                    <textarea id="message" name="message" class="form-control input-sm" rows="3" id="textArea" placeholder="Type a message"></textarea>
                </div>
                <input type="hidden" name="add_time" id="add_time" value="">
                <input type="hidden" name="user_id" id="user_id" value="<?= Auth::getId()?>">
            </form>
        </div>
    </div>
</div>

<script>
//Submit on Enter for chat system
$("#chatlogForm").keydown(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        $("#chatlogForm").submit();
    }
});

//Loads chatroooms and messages
//var id = $('#chatroom_id').val();
//$('#chatlog').load('/message/getAllMessages/'+id);
$('#chatrooms').load('/message/getAllChatrooms');
//$('#chatlog').animate({scrollTop: $(document).height() + 10000},1000);

//Refresh the chatrooms and messages 
setInterval(function(){		
	//console.log(id)
	var id = $('#chatroom_id').val();
    if(id > 0){
        $('#chatlog').load('/message/getAllMessages/'+id);
        $('#chatrooms').load('/message/getAllChatrooms');
    }else{
        $('#chatlog').html("You haven't chosen a chat, Please choose or create a new one.");
    }
	var log = document.getElementById("chatlog");
		log.scrollTop = log.scrollHeight;
},1000);

//Add message to db
$(document).ready(function () {
    $('#chatlogForm').submit(function(){
        $.post('/message/addMessage', $('#chatlogForm').serialize(), function(data){
            console.log(data);
                $.get("/message/getAllMessages"+$('#chatroom_id').val(), function (result) {
                    console.log($('#chatlogForm'));
//                    $('#chatlog').html(result);
            })
        });
       	$('#message').val('');
		return false;
	});
});

//get clicked chatroom and save it to hidden field chatroom_id
function getChatroom(clicked_id, name){
    $('#chatlogForm').show();
    $('#chat_name').html(name);
    $('#chatroom_id').val(clicked_id);
    $(document).ready(function () {
         $.get("/message/getAllMessages/"+clicked_id, function (result) {
                $('#chatlog').html(result);

        })
    })
}

function notify(post_id){
    $(document).ready(function(){
        $.get('/message/getNotification/'+post_id, function(result){
            $('#'+post_id).hide();
            $('#unlike_'+post_id).show();
            var val = parseInt($('#like_'+post_id).html())+1;
            $('#like_'+post_id).html(val);
        })
    })
}
</script>