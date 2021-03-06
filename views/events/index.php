<div class="page-header">
    <h1>Events</h1>
    <a href="/event/addEvent" class="btn btn-success">Add Event</a>
</div>

<div class="list-group">
<?php if(count($events) > 0) foreach($events as $event):
$time = explode("-",$event->event_time);
$time = "<font size='18'>".$time[2]."</font>.".$time[1];
?>
  <a href="/event/show/<?= $event->event_id;?>" class="list-group-item">
  	<div id="events-list" >
	  	<span  class="col-md-1"><?= $time;?></span>
	  	<span class="col-md-10">
	    	<h4 class="list-group-item-heading col-md-offset-1"><?= $event->title; ?></h4>
	    	<p class="list-group-item-text col-md-offset-1"><?= substr($event->body,0, 250)."..."; ?></p>
	    </span>
	    
    </div>
  </a>
<?php endforeach;?>
</div>
