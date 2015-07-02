<div class="page-header">
    <h1>Notifications</h1>
</div>

<a id="<?= Auth::getId()?>" onclick="getNoticed()" class="btn btn-primary">Refresh</a>
<div class="panel-body notifications" id="result"></div>



<script>

function getNoticed(){
	$(document).ready(function(){
		$.get('/notification/getAllNotifications', function(data){
			$('#result').html(data);
		});
	});
}

setInterval(function(){
	id = $('#user_id').val();
	$(document).ready(function(){
		$.get('/notification/getAllNotifications/', function(data){
			$('#result').html(data);  // process results here

		});
	});
}, 4000);

function mark_as_seen(markID){
   // $.ajax({"url": "mark_as_read.php?id="+markID"});

}

</script>