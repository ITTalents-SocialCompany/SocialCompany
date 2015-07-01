<form action="/event/editEvent" method="POST" enctype='multipart/form-data' class="form-horizontal col-md-offset-3 col-md-5" id="event_form">
    <fieldset>
    <legend>Update Event</legend>
    <input type="hidden" name="event_id" value="<?= $event->event_id?>">
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Type a Title.." value="<?= $event->title; ?>" required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-10">
		<textarea class="form-control input-sm" rows="3" name="body" id="textArea" placeholder="Type a body" required><?= $event->body; ?></textarea>     
      </div>
    </div>
    
    <input type="hidden" name="add_time" value="">
    
    <div class="form-group">
    	 <label for="event_time" class="col-lg-2 control-label">Time event</label>
    	 <div class="col-lg-10">
    	 	<input type="text" id="datepicker" name="event_time" class="form-control input-sm" placeholder="Pick a date (yyyy-mm-dd)" value="<?= $event->event_time ?>" required/>
    	 </div>
	</div>
	    
    <div class="form-group">
    	<div class="col-lg-10 col-lg-offset-2">
        	<button type="submit" class="btn btn-primary">Update this event</button>
        </div>
    </div>
    </fieldset>
</form>
