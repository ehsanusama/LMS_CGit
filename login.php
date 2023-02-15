<?php include("functions/login.php");?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>CGiT LMS - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo.png" alt="Logo">
							<!-- <h6>Convert Generation <br> Information Technology - CGit</h6> -->
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								
								<form method="post" enctype="multipart/form-data" >
								<ul class="nav nav-tabs nav-tabs-solid nav-justified">
												<li class="nav-item"><a class="nav-link <?php if(!empty($_REQUEST['login_user']) AND $_REQUEST['login_user']=="admin"){echo "active";} ?>" href="index.php?login_user=admin" >Admin</a></li>
												<li class="nav-item"><a class="nav-link <?php if(!empty($_REQUEST['login_user']) AND $_REQUEST['login_user']=="teacher"){echo "active";} ?>" href="index.php?login_user=teacher" >Teacher</a></li>
												<li class="nav-item"><a class="nav-link <?php if(!empty($_REQUEST['login_user']) AND $_REQUEST['login_user']=="student"){echo "active";} ?>" href="index.php?login_user=student" >Student</a></li>
								</ul>
								<br>
									
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email" name="email">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
									</div>
								</form>
								<?php  login(); ?>
								<!-- /Form -->
								
								<!-- <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div> -->
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>