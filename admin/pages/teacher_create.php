<div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Add Teachers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Teachers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="container ">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Teacher Details</h4>
									</div>
									<div class="card-body">
										<!-- Update Student -->
										<?php if(isset($_GET['edit'])){ 
											$id =  $id = $_GET['edit'];
											 $q="SELECT * FROM teacher WHERE teacher_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
                                    }
											?>

										<form action="">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" id="name" value="<?=@$data['teacher_fname'] ;?>">
													</div>
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" id="lname" value="<?=@$data['teacher_lname'] ;?>">
													</div>
													
													<div class="form-group">
														<label>Gender</label>
														<select class="select" id="gender" value="<?=@$data['teacher_gender'] ;?>">
															<option>Select</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
													<div class="form-group">
														<label>CNIC</label>
														<input type="number" id="cnic" class="form-control" value="<?=@$data['teacher_cnic'] ;?>"> 
													</div>
													
												
												</div>
												<div class="col-md-6">
												<div class="form-group">
														<label>Image</label>
														<input type="file" id="img" class="form-control" value="<?=@$data['teacher_img'] ;?>"> 
													</div>
													<div class="form-group">
														<label>Phone</label>
														<input type="text" id="phone" class="form-control" value="<?=@$data['teacher_phone'] ;?>"> 
													</div>
                                                	<div class="form-group">
														<label>Email</label>
														<input type="email" class="form-control" id="email" value="<?=@$data['teacher_email'] ;?>">
													</div>
													
													<div class="form-group">
														<label>Password</label>
														<input type="text" class="form-control" id="password" value="<?=@ $data['teacher_password'] ;?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Qualification</label>
														<input type="text" class="form-control" id="qua" value="<?=@$data['teacher_qua'] ;?>">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control" id="adress" value="<?=@$data['teacher_adress'] ;?>">
													</div>
												</div>
											</div>
											<input	hidden type="text" class="form-control" id="t_id" value="<?=@$data['teacher_id'] ;?>">
											<div class="text-right">
                                            <a href="?nav=teacher_create"><button type="" class="btn btn-primary" id="teacher_create">Add</button> </a>
											</div>
										</form>
										<?php 	?>
									<!-- /Update Student -->

									<!-- Create Student -->

									</div>
								</div>
							</div>
						</div>
					</div>	
</div>