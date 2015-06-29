<div class="page-header">
    <h1>Events</h1>
    <a href="/event/addEvent" class="btn btn-success">Add Event</a>
</div>

<div class="list-group">
<?php if(count($events) > 0) foreach($events as $event):
$time = explode("-",$event->event_time);
$time = "<font size='18'>".$time[2]."</font>.".$time[1];
?>
  <a href="event/<?= $event->event_id;?>" class="list-group-item">
  	<span  class="col-lg-offset-0"><?= $time;?></span>
    	<h4 class="list-group-item-heading col-lg-offset-1"><?= $event->title; ?></h4>
    	<p class="list-group-item-text col-lg-offset-1"><?= $event->body; ?></p>
  </a>
<?php endforeach;?>
</div>
