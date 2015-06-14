<div class="well" style="background: url(<?= $profile_detail->cover_img_url?>) no-repeat center">
    <div class="profile-img">
        <img class="thumbnail" src="<?= $profile_detail->profile_img_url ? $profile_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="200px" height="200px">
    </div>
</div>

<div class="well col-md-3">
    <p><strong>First Name : </strong><?= $user->first_name?></p>
    <p><strong>Last Name : </strong><?= $user->last_name?></p>
    <p><strong>Age : </strong><?= $profile_detail->age?></p>
    <p><strong>Email : </strong><?= $profile_detail->email?></p>
</div>