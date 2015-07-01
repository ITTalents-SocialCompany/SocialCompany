<a href="/message/addChatroom" class="list-group-item active">
    <h4 class="list-group-item-heading">Add new</h4>
</a>
<?php if(count($chatrooms) > 0):?>
    <?php foreach($chatrooms as $chatroom):?>
        <a href="#" class="list-group-item" id="<?= $chatroom->getChatroom_id(); ?>" onclick="getChatroom(this.id, '<?= $chatroom->getTitle()?>');">
            <div>
                <h4 class="list-group-item-heading"><?= $chatroom->getTitle(); ?></h4>
                <p class="list-group-item-text"><?= $chatroom->getParticipants(); ?></p>
            </div>
        </a>
    <?php endforeach;?>
<?php else: ?>
    <p>
    No chats
    </p>
<?php endif;?>

