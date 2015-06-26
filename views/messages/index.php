<div class="well col-md-offset-1 col-md-10">

	<div id="chatrooms" class="list-group col-md-offset-0 col-md-4">
	 	<img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait .. 
	</div>
	<div class="list-group col-md-offset-0 col-md-8">
		<div id="chatlog" class="col-md-12" style="height: 600px; overflow:auto;">
		 	<img src="../storage/loading_icon.gif" id="imageLoad" width="20" height="20" /> Loading, please wait .. 
		</div>
		<form  id="chatlogForm" class="form-horizontal col-md-offset-0 col-md-12">			
			<input type="hidden" name="chatroom_id" id="chatroom_id" value="13"/>
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
	
	setInterval(function(){		
		$('#chatrooms').load('/message/getAllChatrooms');
		$('#chatlog').load('/message/getAllMessages');
		var log = document.getElementById("chatlog");
		log.scrollTop = log.scrollHeight;
	},1000);

	var height = 0;
	$('#schatlog p').each(function(i, value){
	    height += parseInt($(this).height());
	});

	height += '';

	$('#chatlog').animate({scrollTop: height});

	$(document).ready(function () {
		$('#chatlogForm').submit(function(){
 	        $.post('/message/addMessage', $('#chatlogForm').serialize(), function(data){

		 	        $.get("/message/getAllMessages", function (result) {
	 	            	$('#chatlog').html(result);
	 	        })
	 	    	
		 	});
 	       	$('#message').val('');
			return false;
		});
	});

	</script>

	