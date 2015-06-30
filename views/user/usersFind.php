<?php if(count($users) > 0) foreach($users as $user):?>
    <div class="list-group-item">
        <?php if($user->user_id == Auth::getId()): ?>
            <a href="/profile/index">
        <?php else: ?>
            <a href="/profile/user/<?= $user->username?>">
        <?php endif;?>
            <img class="search-img" src="<?= $user->user_detail->profile_img_url ?
                $user->user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="40" height="40">
            <span class="search-name">
                <strong><?= "$user->first_name $user->last_name"?></strong>
            </span>
        </a>
    </div>
<?php endforeach;?>