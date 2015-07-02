<h3>Chat notifications</h3>
<div class="list-group">
	<?php if(count($chatNotifications) > 0) foreach($chatNotifications as $chatNotification):?>
  	<a href="#" class="list-group-item" id="<?= $chatNotification->chatroom_id ?>" onclick="seeNotification(this.id)">
    	<h4 class="list-group-item-heading">You have a new chat: "<?= $chatNotification->title ?>"</h4>
  	</a>
  	<?php endforeach;?>
</div>

<h3>Post notifications</h3>
