<div class="col-md-offset-1 col-md-10">
<!--    <h1 class="text-center">Information</h1>-->
    <div class="well col-md-12">
        <strong>Basic Information</strong>
        <hr>
        <div class="row">
            <div class="col-md-offset-1 col-md-5">
                <p><strong>Age : </strong><?= $user->user_detail->age?></p>
                <p><strong>Birthdate : </strong>
                    <?= $user->user_detail->birthdate !== "0000-00-00" ? $user->user_detail->birthdate : "" ?></p>
            </div>
            <div class="col-md-offset-1 col-md-5">
                <p><strong>Email : </strong><?= $user->user_detail->email?></p>
                <p><strong>Phone : </strong><?= $user->user_detail->phone?></p>
            </div>
        </div>
        <hr>
        <strong>Education</strong>
        <hr>
        <div class="row">
            <div class="col-md-offset-1 col-md-5">
                <p><strong>University Name : </strong><?= $user->user_detail->university_name?></p>
                <p><strong>University Spec : </strong><?= $user->user_detail->university_spec?></p>
            </div>
        </div>
        <hr>
        <strong>Skills</strong>
        <hr>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <p><strong><?= $user->user_detail->skills?></strong></p>
            </div>
        </div>
        <hr>
    </div>
</div>