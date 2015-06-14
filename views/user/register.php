<h1 class="text-center">Register</h1>
<form action="/user/registerPost" method="post" class="col-md-offset-4 col-md-4">

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-user text-muted"></i>
				</span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                   value="<?= isset($error) ? $user->username : ''?>" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-asterisk text-muted"></i>
				</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-font text-muted"></i>
				</span>
            <input type="text" class="form-control" id="name" name="first_name" placeholder="First Name"
                   value="<?= isset($error) ? $user->first_name : ''?>" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-font text-muted"></i>
				</span>
            <input type="text" class="form-control" id="name" name="last_name" placeholder="Last Name"
                   value="<?= isset($error) ? $user->last_name : ''?>" required>
        </div>
    </div>

    <div class="text-center form-group">
        <button type="submit" class="btn btn-success btn-block">Register</button>
    </div>

</form>