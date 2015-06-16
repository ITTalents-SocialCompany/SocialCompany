<div class="well col-md-offset-1 col-md-10" style="background: url(<?= $user_detail->cover_img_url?>) no-repeat center">
    <div class="profile-img">
        <img class="thumbnail" src="<?= $user_detail->profile_img_url ? $user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="200px" height="200px">
    </div>
    <nav class="navbar navbar-inverse profile-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/profile/index">Timeline</a></li>
                    <li><a href="/profile/informations">Informations</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="well col-md-3 col-md-offset-1">
    <p><strong>First Name : </strong><?= $user->first_name?></p>
    <p><strong>Last Name : </strong><?= $user->last_name?></p>
    <p><strong>Age : </strong><?= $user_detail->age?></p>
    <p><strong>Email : </strong><?= $user_detail->email?></p>
</div>