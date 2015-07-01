<?php require_once "views/layouts/header.php"?>
    <div class="jumbotron">
        <h1>Internal server error</h1>
        <p>The best website for Company communication is not available at the moment. Please try again later!</p>
        <p><a href="/" class="btn btn-primary btn-lg">Back to Home</a></p>
    </div>
    <script>
        setTimeout(function(){ window.location = "/user/login"; }, 2000);
    </script>
<?php require_once "views/layouts/footer.php"?>