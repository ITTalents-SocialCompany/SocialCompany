<div class="well col-md-offset-1 col-md-10" style="background: url(<?= $user_detail->cover_img_url?>) no-repeat center">
    <div class="profile-img">
        <img class="thumbnail" src="<?= $user_detail->profile_img_url ? $user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" width="200px" height="200px">
    </div>
    <nav class="navbar navbar-inverse profile-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a onclick="timeline();">Timeline</a></li>
                    <li><a onclick="information();">Information</a></li>
                    <li><a onclick="members();">Members</a></li>
                    <li><a onclick="settings();">Settings</a></li>
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

<div id="settings" hidden="hidden">
    <?php require_once "views/profile/settings.php";?>
</div>

<script>
    function timeline(){
        document.getElementById("timeline").hidden = null;
        document.getElementById("information").hidden = "hidden";
        document.getElementById("members").hidden = "hidden";
        document.getElementById("settings").hidden = "hidden";
    }
    function information(){
        document.getElementById("timeline").hidden = "hidden";
        document.getElementById("information").hidden = null;
        document.getElementById("members").hidden = "hidden";
        document.getElementById("settings").hidden = "hidden";
    }
    function members(){
        document.getElementById("timeline").hidden = "hidden";
        document.getElementById("information").hidden = "hidden";
        document.getElementById("members").hidden = null;
        document.getElementById("settings").hidden = "hidden";
    }
    function settings(){
        document.getElementById("timeline").hidden = "hidden";
        document.getElementById("information").hidden = "hidden";
        document.getElementById("members").hidden = "hidden";
        document.getElementById("settings").hidden = null;
    }
</script>