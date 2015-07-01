<div class="col-md-offset-1 col-md-10">
    <?php if(count($user_teams) > 0): ?>
        <?php foreach($user_teams as $user_team): ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $user_team->team->name?></h3>
                </div>
                <div class="panel-body">
                    <?php foreach($user_team->users as $user) :?>
                        <?php if($user->user_id !== Auth::getId()): ?>
                        <a href="/profile/user/<?= $user->username?>" class="team-member">
                            <img class="thumbnail" src="<?= $user->user_detail->profile_img_url ? $user->user_detail->profile_img_url :
                                DEFAULT_PROFILE_IMG?>" height="130px">
                            <p class="text-center"><?= "$user->first_name $user->last_name"?></p>
                        </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>