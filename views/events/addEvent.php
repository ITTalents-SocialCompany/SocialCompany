<form action="/event/addEventPost" method="POST" enctype='multipart/form-data' class="form-horizontal col-md-offset-3 col-md-5" id="event_form">
    <fieldset>
    <legend>Add Event</legend>
    
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Type a Title.." required>
      </div>
    </div>
    
    <div class="form-group">
      <label for="title" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-10">
		<textarea class="form-control input-sm" rows="3" name="body" id="body" placeholder="Type a body" required></textarea>     
      </div>
    </div>
    
    <input type="hidden" name="add_time" value="">
    
    <div class="form-group">
    	 <label for="event_time" class="col-lg-2 control-label">Time event</label>
    	 <div class="col-lg-10">
    	 	<input type="text" id="datepicker" name="event_time" class="form-control input-sm" placeholder="Pick a date (yyyy-mm-dd)" required/>
    	 </div>
	</div>

	<div class="form-group">
        <label class="col-lg-2 control-label" for="cover_img_url">Upload Cover Img:</label>
        <div class="col-lg-10">
             <input type="file" name="cover_img_url" accept="image/*" id="cover_img_url">
        </div>
    </div>
        
    <div class="form-group">
    	<div class="col-lg-10 col-lg-offset-2">
        	<button type="submit" class="btn btn-primary">Add this event</button>
        </div>
    </div>
    </fieldset>
</form>



