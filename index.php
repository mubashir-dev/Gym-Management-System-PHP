<?php
include_once "objects/objects.php";  
session_start();
if(isset($_SESSION['logged_in'])){
	header('location:Home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Include Css Files-->
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>360 Fitness Club Abbottabad  </title>
</head>
<body class="bg-dark">
<div class="container mt-5">
<h3 class="text-center text-white">360 Fitness Club Abbottabad</h3>
<div class="card card-login mx-auto mt-5 radius_zero" style="width:400px">
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
            <label for="inputEmail">Username</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <label for="inputPassword">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <a class="btn btn-primary btn-block btn_login" href="#">Login</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
</div>
</div>
<p class="mt-2 text-center text-white">Developed By AbcTech</p>
<!--Include Js Files-->
<script src="public/js/bootstrap.js"></script>
<script src="public/js/JQurey.js"></script>
<script src="public/js/script.js"></script>
</body>
</html>