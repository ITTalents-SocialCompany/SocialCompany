<div id="logs">
    <?php if(count($messages) > 0) foreach($messages as $message):?>
        <?php if($message->getUserId() !== Auth::getId()):?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p class="messages"><small><?= substr($message->getTime(), strpos($message->getTime(), " ") + 1);?></small>&nbsp;&nbsp;<b><?= $message->getUsername();?></b>:  <?= $message->getMessage();?></p>
                </div>
            </div>
        <?php else:?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p class="messages">
                        <small>
                            <?= substr($message->getTime(), strpos($message->getTime(), " ") + 1);?>
                        </small>&nbsp;&nbsp;
                        <b><?= $message->getUsername();?></b>:  <?= $message->getMessage();?></p>
                </div>
            </div>
        <?php endif;?>
    <?php endforeach;?>
</div>