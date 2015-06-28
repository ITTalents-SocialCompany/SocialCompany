<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Social Company</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/message/index">Messages <span class="badge">3</span></a></li>
                <?php if(Auth::isAdmin()):?>
                    <li><a href="/admin/index">Admin Panel</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Controll <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/users">All Users</a></li>
                            <li><a href="/admin/teams">All Teams</a></li>
                            <li><a href="/admin/categories">All Categories</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li><a href="/event/index">Events</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(Auth::isLoggedIn()): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $_SESSION['first_name']?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/profile/index">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="/profile/edit">Profile Info Edit</a></li>
                            <li><a href="/profile/imgs">Profile Imgs</a></li>
                            <li class="divider"></li>
                            <li><a href="/user/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="/user/login">Login</a></li>
                    <li><a href="/user/register">Register</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>