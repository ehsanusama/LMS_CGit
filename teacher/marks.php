<?php  include ("../functions/login.php");
if(isset($_SESSION['email'] ) && $_SESSION['type'] == 2  ){
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Mark Assignments</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<?php include("includes/header.php");  ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php include("includes/slider.php");  ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Mark Assignment</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Mark Assignment</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="container ">
						<div class="row justify-content-center">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Mark Assignment</h4>
									</div>
									<div class="card-body">
										<form action="#">
										<div class="form-group">
												<label>Obtain Marks</label>
												<input type="number" class="form-control" min="0">
											</div>
											<div class="form-group">
												<label>Total Marks</label>
												<input type="number" class="form-control" min="0">
											</div>
											
											
											<div class="text-right">
												<button type="submit" class="btn btn-primary">Upload</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
    </body>

</html>

<?php }
else{
    // echo "Please Login First !!!";
    ?>
    <script>
        setTimeout(function(){ window.location.href="error-404.html" });
    </script>
    <?php
}
?>