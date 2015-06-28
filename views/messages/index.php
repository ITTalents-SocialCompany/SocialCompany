<div class="well col-md-offset-1 col-md-10">
	<div>
		<div id="chatrooms" class="list-group col-md-offset-0 col-md-4" style="height: 430px; overflow:auto;">
		 	<img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait .. 
		</div>
	</div>&nbsp;
	<div class="list-group col-md-offset-0 col-md-8">
		<div id="chatlog" class="col-md-12" style="height: 450px; overflow:auto;">
		 	<img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait .. 
		</div>
		<form  id="chatlogForm" class="form-horizontal col-md-offset-0 col-md-12">			
			<input type="hidden" name="chatroom_id" id="chatroom_id" value="1"/>
		    <div class="form-group">
		 		<textarea id="message" name="message" class="form-control input-sm" rows="3" id="textArea" placeholder="Type a message"></textarea>
		 	</div>
		 	<input type="hidden" name="add_time" id="add_time" value="">
		    <input type="hidden" name="user_id" id="user_id" value="<?= Auth::getId()?>">
		    <div class="form-group">
		        <button id="submit" type="submit"  class="btn btn-primary">Send</button>
		    </div>
		</form>
	</div>
</div>
<script>

	//Submit on Enter
	$("#chatlogForm").keydown(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        $("#chatlogForm").submit();
	    }
	});
	
	//Loads chatroooms and messages
	var id = $('#chatroom_id').val();
	$('#chatlog').load('/message/getAllMessages/'+id);
	$('#chatrooms').load('/message/getAllChatrooms');
	$('#chatlog').animate({scrollTop: $(document).height() + 10000},1000);

	setInterval(function(){		
		var id = $('#chatroom_id').val();
		console.log(id);
		$('#chatrooms').load('/message/getAllChatrooms');
		$('#chatlog').load('/message/getAllMessages/'+id);
		var log = document.getElementById("chatlog");
    		log.scrollTop = log.scrollHeight;
		
	},1000);


	function id(clicked_id){
		return clicked_id;
		}
	
	//Add message to db
	$(document).ready(function () {
		$('#chatlogForm').submit(function(){
 	        $.post('/message/addMessage', $('#chatlogForm').serialize(), function(data){
		 	        $.get("/message/getAllMessages"+id(clicked_id), function (result) {
	 	            	$('#chatlog').html(result);
	 	            	
	 	            	
	 	        })
	 	    	
		 	});
 	       	$('#message').val('');
			return false;
		});
	});

	
	//=======================================================
	
	function getId(clicked_id){
// 		console.log(clicked_id);
			$('#chatroom_id').val(clicked_id);
			getId.called = true;
			$(document).ready(function () {
					if(getId.called) {
				 	        $.get("/message/getAllMessages/"+clicked_id, function (result) {
//						 	        console.log(result);
			 	            	$('#chatlog').html(result);
		 	            	
			 	        })

				}
			})
	}
	
	</script>



















	