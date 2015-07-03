<h3>Chat notifications</h3>
<div class="list-group">
	<?php if(count($chatNotifications) > 0) foreach($chatNotifications as $chatNotification):?>
  	<a href="#" class="list-group-item" id="<?= $chatNotification->object_id ?>" onclick="seeChatNotification(this.id)">
    	<h4 class="list-group-item-heading"><small>You have a new chat: </small>"<b><?= $chatNotification->title ?></b>"</h4>
  		
  	</a>
  	<?php endforeach;?>
</div>

<h3>Post notifications</h3>
<div class="list-group">
	<?php if(count($postNotifications) > 0) foreach($postNotifications as $postNotification):?>
  	<a href="#" class="list-group-item" id="<?= $postNotification->object_id ?>" onclick="seePostNotification(this.id)">
    	<h4 class="list-group-item-heading"><small>You are tagged in a new post: </small>"<b><?= $postNotification->title ?></b>"</h4>
  		
  	</a>
  	<?php endforeach;?>
</div>