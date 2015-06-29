<!-- <div class="well col-md-offset-1 col-md-10" style="background: url(<?= $event->cover_img_url; ?>) no-repeat center"> -->
<?php 
$time = explode("-",$event->event_time);
$time = "<font size='6'><strong>".$time[2]."</strong></font>.".$time[1];
?>     
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $time; ?>&nbsp;&nbsp;&nbsp;<font size="5"><strong><?= $event->title; ?></strong></font></h3>
  </div>
  <div class="panel-body">
    <img src="<?= $event->cover_img_url; ?>" width="400" class="event_img"/>
    <?= $event->body; ?>
  </div>
</div>          

<!-- </div> -->
