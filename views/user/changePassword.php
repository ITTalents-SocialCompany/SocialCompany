<form action="/user/changePasswordPost" class="form-horizontal col-md-offset-3 col-md-5" method="post" id="changePasswordForm">
    <fieldset>
        <legend>Change Password</legend>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Old Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="old_password" id="inputPassword" placeholder="Old Password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputNewPassword" class="col-lg-2 control-label">New Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="new_password" id="inputNewPassword" placeholder="New Password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="new_password" id="inputConfirmPassword" placeholder="Confirm Password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </div>
    </fieldset>
</form>