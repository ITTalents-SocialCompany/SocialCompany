<h1 class="text-center">Login</h1>
<form action="/user/loginPost" method="post" class="col-md-offset-4 col-md-4">

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

    <div class="text-center form-group">
        <button type="submit" class="btn btn-success btn-block">Login</button>
    </div>

</form>