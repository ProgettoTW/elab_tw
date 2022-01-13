<?php
require_once("includes/header.php");

if (isset($_GET['error'])) {
    echo 'Error Logging In!';
}
?>

<link rel="stylesheet" href="/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="/js/login_module.js"></script>
<script src="/js/jquery_validation_messages.js"></script>

<div class="container-fluid">
    <div class="row">
        <h1 class="page_title">Login</h1>
        <form action="includes/login.php" method="post" name="login_form" id="login_form">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="email@email.com"/><br/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="password" type="password" name="p"/><br/>
            </div>
            <input id="login_button" class="btn btn-primary" type="submit" value="Login"/>
        </form>
    </div>
</div>
