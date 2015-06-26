<a href="/message/addChatroom" class="list-group-item active">
    <h4 class="list-group-item-heading">Add new</h4>
</a>
<?php if(count($chatrooms) > 0) foreach($chatrooms as $chatroom):?>
  <a href="#" class="list-group-item" id="<?= $chatroom->getChatroom_id(); ?>" onclick="getId(this.id);">
    <h4 class="list-group-item-heading"><?= $chatroom->getTitle(); ?></h4>
    <p class="list-group-item-text"><?= $chatroom->getParticipants(); ?></p>
  </a>
<?php endforeach;?>
<script>
function getId(clicked_id){
	return clicked_id;
}
</script>