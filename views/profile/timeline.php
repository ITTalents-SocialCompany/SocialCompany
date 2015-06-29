<div class="col-md-offset-1 col-md-10">
    <input type="hidden" id="id" value="<?= $user->user_id?>"/>
    <div class="well col-md-3">
        <p><strong>Age : </strong><?= $user->user_detail->age?></p>
        <p><strong>Email : </strong><?= $user->user_detail->email?></p>
        <p><strong>Phone : </strong><?= $user->user_detail->phone?></p>
        <p><strong>Gender : </strong><?= $user->user_detail->gender?></p>
    </div>
    <div class="col-md-9" id="posts"></div>
</div>
<script src="/libs/js/timeline.js"></script>