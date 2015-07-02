<div class="list-group">
	<?php if(count($notifications) > 0) foreach($notifications as $notification):?>
  	<a href="#" class="list-group-item" onclick="seeNotification(this.id)">
    	<h4 class="list-group-item-heading"><?= $notification->notification_id ?></h4>
    	<p class="list-group-item-text"><?= $notification->chatroom_id ?></p>
  	</a>
  	<?php endforeach;?>
</div>