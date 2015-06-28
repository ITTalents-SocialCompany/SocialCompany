<form action="" method="POST" class="form-horizontal col-md-offset-3 col-md-5" id="event_form">
    <div class="form-group">
        <input class="form-control input-sm" name="title" type="text" id="inputSmall" placeholder="Type a title">
    </div>
    <div class="form-group">
        <textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body"></textarea>
    </div>
    <div class="form-group" id="select_tag_users">
        <select class="form-control input-sm" multiple="" name="tagged_users[]">
            <?php foreach($users as $user):?>
                <option value="<?= $user->user_id?>"><?= "$user->first_name $user->last_name"?></option>
            <?php endforeach;?>
        </select>
    </div>
    <input type="hidden" name="user_id" value="<?= Auth::getId()?>">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
</form>
