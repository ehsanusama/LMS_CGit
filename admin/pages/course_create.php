<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Add Course</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Course</li>
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
										<h4 class="card-title">Course Details</h4>
									</div>
									<div class="card-body">
										<?php 
										if(isset($_GET['edit'])){ 
											$id =  $id = $_GET['edit'];
											 $q="SELECT * FROM classes WHERE class_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
											} 
											?>
											<form action="">
											<div class="form-group">
												<label>Name</label>
												<input type="text" class="form-control"id="c_name" value="<?=@$data['class_name'] ;?>" >
											</div>
											
											<div class="form-group">
												<label>Status:</label>
												<select class="select" id="c_status">
													<option value="Active" <?php if(@$data['class_status']=='Active'){echo "selected";} ?> >Active</option>
													<option value="Inactive" <?php if(@$data['class_status']=='Inactive'){echo "selected";} ?>>Inactive</option>
												</select>
											</div>
											<input hidden	type="text" class="form-control"id="c_id" value="<?=@$data['class_id'] ;?>" >

											<div class="text-right">
												<a href="?nav=course_create"><button type="" class="btn btn-primary" id="course_create">Add</button></a>
											</div>
										</form>
										<?php 	?>
									</div>
								</div>
							</div>
						</div>
					</div>
</div>

       