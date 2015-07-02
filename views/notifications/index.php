<div class="page-header">
    <h1>Notifications</h1>
</div>

<div class="panel-body notifications" id="result"></div>

<script>

	$(document).ready(function(){
		$.get('/notification/getAllNotifications', function(data){
			$('#result').html(data);
		});
	});


setInterval(function(){
	$(document).ready(function(){
		$.get('/notification/getAllNotifications/', function(data){
			$('#result').html(data);			
		});
	});
}, 5000);

function seeChatNotification(id){
	//isseen = true
	//redirect to messages
	$(document).ready(function(){
		$.get('/notification/changeNotificationStatus/'+id, function(data){

			document.location.href="/message/index";
		
		});
	});
}

function seePostNotification(id){
	//isseen = true
	//redirect to messages
	$(document).ready(function(){
		$.get('/notification/changeNotificationStatus/'+id, function(data){

			document.location.href="/post/index/"+id;
		
		});
	});
}

</script>