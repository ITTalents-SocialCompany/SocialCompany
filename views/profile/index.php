<div class="well col-md-offset-1 col-md-10" style="background: url(<?= $user->user_detail->cover_img_url?>) no-repeat center">
    <div class="profile-img">
        <img class="thumbnail" src="<?= $user->user_detail->profile_img_url ? $user->user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="200px" height="200px">
    </div>
    <nav class="navbar navbar-inverse profile-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><?= "$user->first_name $user->last_name"?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#timeline" onclick="timeline();">Timeline</a></li>
                    <li><a href="#information" onclick="information();">Information</a></li>
                    <li><a href="#members" onclick="members();">Members</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="timeline">
    <?php require_once "views/profile/timeline.php";?>
</div>

<div id="information" hidden="hidden">
    <?php require_once "views/profile/information.php";?>
</div>

<div id="members" hidden="hidden">
    <?php require_once "views/profile/members.php";?>
</div>

<script>
    function timeline(){
        document.getElementById("timeline").hidden = null;
        document.getElementById("information").hidden = "hidden";
        document.getElementById("members").hidden = "hidden";
    }
    function information(){
        document.getElementById("timeline").hidden = "hidden";
        document.getElementById("information").hidden = null;
        document.getElementById("members").hidden = "hidden";
    }
    function members(){
        document.getElementById("timeline").hidden = "hidden";
        document.getElementById("information").hidden = "hidden";
        document.getElementById("members").hidden = null;
    }
</script>