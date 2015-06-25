<form action="/admin/addUserToTeamPost" method="post" class="form-horizontal col-md-offset-3 col-md-5">
    <fieldset>
        <legend>Add User to Team</legend>
        <div class="form-group col-md-12">
            <select class="form-control input-sm" name="team_id">
                <?php foreach($teams as $team):?>
                    <option value="<?= $team->team_id?>"><?= $team->name?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group col-md-12">
            <select class="form-control input-sm" name="user_id">
                <?php foreach($users as $user):?>
                    <option value="<?= $user->user_id?>"><?php echo "$user->first_name $user->last_name";?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </fieldset>
</form>