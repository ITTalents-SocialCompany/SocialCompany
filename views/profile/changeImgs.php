<form class="form-horizontal" action="/profile/changeImgs" enctype='multipart/form-data' method="post">
    <fieldset>
        <legend>Edit Profile Images</legend>

        <div class="form-group">
            <label class="col-lg-2 control-label" for="profile_img_url">Upload Profile Img:</label>
            <div class="col-lg-10">
                <input type="file" name="profile_img_url" onchange="readURL(this);">
            </div>
            <div class="col-lg-10">
                <img class="thumbnail" id="profile_img_url" src="<?= $user_detail->profile_img_url ?
                    $user_detail->profile_img_url : DEFAULT_PROFILE_IMG?>" height="200"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label" for="cover_img_url">Upload Cover Img:</label>
            <div class="col-lg-10">
                <input type="file" name="cover_img_url" onchange="readURL(this);">
            </div>
            <div class="col-lg-10">
                <img class="thumbnail" id="cover_img_url" src="<?= $user_detail->cover_img_url ?
                    $user_detail->cover_img_url : DEFAULT_PROFILE_IMG?>" height="200"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <a href="/profile/index" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <input type='hidden' name='MAX_FILE_SIZE' value='100000000' />
</form>

<script>
    function readURL(input){
        console.log(input.name);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var f = '#'+input.name;
                $(f)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>