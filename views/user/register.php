<h1 class="text-center">Register</h1>
<form action="/SocialCompany/user/registerPost" method="post" class="col-md-offset-4 col-md-4">

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-user text-muted"></i>
				</span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
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
					<i class="glyphicon glyphicon-asterisk text-muted"></i>
				</span>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-font text-muted"></i>
				</span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-envelope text-muted"></i>
				</span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
    </div>

    <div class="text-center form-group">
        <button type="submit" class="btn btn-success btn-block">Register</button>
    </div>

</form>