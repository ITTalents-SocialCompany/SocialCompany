<?php if(count($messages) > 0) foreach($messages as $message):?>
    <div class="panel panel-default">
	  <div class="panel-body">
	    <?= substr($message->getTime(), strpos($message->getTime(), " ") + 1);?>&nbsp;&nbsp;<?= $message->getUsername();?> : <?= $message->getMessage();?>
	  </div>
	</div>
    	    
<?php endforeach;?>
