<form action="/profile/editPost" method="post" class="form-horizontal col-md-offset-3 col-md-5">
    <fieldset>
        <legend>Edit Profile Information</legend>
        <div class="form-group">
            <label for="age" class="col-lg-2 control-label">Age</label>
            <div class="col-lg-10">
                <input class="form-control" type="text" id="age" name="age" placeholder="Age"
                       value="<?= $user_detail->age?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputEmail" name="email" placeholder="Email" type="email"
                       value="<?= $user_detail->email?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
            <div class="col-lg-10">
                <input class="form-control" id="inputPhone" name="phone" placeholder="Phone" type="text"
                       value="<?= $user_detail->phone?>">
            </div>
        </div>

        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Selects</label>
            <div class="col-lg-10">
                <select name="gender_id" class="form-control" id="select">
                    <option value="1" <?= $user_detail->gender_id == 1 ? "selected" : ""?>>Male</option>
                    <option value="2" <?= $user_detail->gender_id == 2 ? "selected" : ""?>>Female</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="user_id" value="<?= Auth::getId()?>">

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>