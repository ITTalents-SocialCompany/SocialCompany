<?php 
$time = explode("-",$event->event_time);
$time = "<font size='6'><strong>".$time[2]."</strong></font>.".$time[1];
?>     
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">
    	<?= $time; ?>&nbsp;&nbsp;&nbsp;<font size="5"><strong><?= $event->title; ?></strong></font>
    	<?php if(Auth::isAdmin()):?>
    		<a href="/event/delete/<?= $event->event_id?>" onclick="return confirm('Are you sure?');">
    			<span class="glyphicon glyphicon-remove pull-right" id="remove_button"></span>
    		</a>
    		<a href="/event/edit/<?= $event->event_id?>">
            	<span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span>
            </a>
    	<?php endif;?>
    </h3>
  	
  </div>
  <div class="panel-body">
    <img src="<?= $event->cover_img_url; ?>" width="400" class="event_img"/>
    <?= $event->body; ?>
  </div>
</div>          

