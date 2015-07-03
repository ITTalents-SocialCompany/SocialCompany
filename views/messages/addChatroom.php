<form action="/message/addChatroomPost" method="POST" class="form-horizontal" id="form_add_chatroom">
  <fieldset>
    <legend>Add chatroom</legend>

    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="title" name="chat_title" placeholder="Type a Title..">
      </div>
    </div>
    
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Participants</label>
      <div class="col-lg-10">
        <select multiple class="form-control" name="participants[]">
        	<?php if(count($users) > 0) foreach($users as $user):?>
          	<option value="<?= $user->user_id; ?>"><?= $user->username; ?></option>
          	<?php endforeach;?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <a onclick="location.href='/message/index'" class="btn btn-default">Cancel</a>    
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
