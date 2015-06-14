<form action="/profile/editPost" method="post" class="form-horizontal">
    <fieldset>
        <legend>Edit Profile Information</legend>
        <div class="form-group">
            <label for="age" class="col-lg-2 control-label">Age</label>
            <div class="col-lg-10">
                <input class="form-control" type="text" id="age" name="age" placeholder="Age"
                       value="<?= $profile_detail->age?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputEmail" name="email" placeholder="Email" type="email"
                       value="<?= $profile_detail->email?>">
            </div>
        </div>

        <input type="hidden" name="user_id" value="<?= $auth->getUserId()?>">

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>