<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Add Students</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Students</li>
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
										<h4 class="card-title">Student Details</h4>
									</div>
									<div class="card-body">
										<!-- Update Student -->
									<?php if(isset($_GET['edit'])){ 
											$id =  $id = $_GET['edit'];
											 $q="SELECT * FROM student WHERE student_id='$id'";
											 include ("../db/conection.php");
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
														<input type="text" class="form-control" id="name" value="<?=@$data['student_fname'] ;?>">
													</div>
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" id="lname" value="<?=@$data['student_lname'] ;?>">
													</div>
													<div class="form-group">
														<label>Father Name</label>
														<input type="text" class="form-control" id="fname" value="<?=@$data['guardian_name'] ;?>">
													</div>
													<div class="form-group">
														<label>Gender</label>
														<select class="select" id="gender" value="<?=@$data['student_gender'] ;?>">
															<option>Select</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
													
												
												</div>
												<div class="col-md-6">
                                                    
                                                <div class="form-group">
														<label>Course</label>
														<select class="select" multiple="multiple" id="course">
														
														<?php
															$q="SELECT * FROM classes WHERE class_status='Active'";
															$q_run = mysqli_query($conn,$q);
															while($course = mysqli_fetch_array($q_run)){
																?>
																<option value="<?php echo $course ['class_name']; ?>">  <?php echo $course ['class_name']; ?></option>
																<?PHP
																	}
															?>
														</select>
													</div>
													
													<div class="form-group">
														<label>Batch</label>
														<select class="select " id="batch" multiple="multiple" >	
														<?php
															$q="SELECT * FROM section WHERE section_status='Active'";
															$q_run = mysqli_query($conn,$q);
															while($value = mysqli_fetch_array($q_run)){
																?>
																<option value="<?php echo $value ['section_name']; ?>">  <?php echo $value ['section_name']; ?></option>
																<?PHP
																	}
															?>
														</select>
													</div>
													<div class="form-group">
														<label>Phone</label>
														<input type="text" id="phone" class="form-control" value="<?=@$data['student_phone'] ;?>"> 
													</div>
													<div class="form-group">
														<label>Email</label>
														<input type="email" class="form-control" id="email" value="<?=@$data['student_email'] ;?>">
													</div>
													<div class="form-group">
														<label>Password</label>
														<input type="text" class="form-control" id="password" value="<?=@ $data['student_password'] ;?>">
													</div>
												</div>
											</div>
											<h4 class="card-title">Additional Information</h4>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Guardian Contact</label>
														<input type="phone" class="form-control" id="fphone" value="<?=@$data['guardian_phone'] ;?>">
													</div>
													
				
												</div>
												<div class="col-md-6">
				
													<div class="form-group">
														<label>Guardian Email </label>
														<input type="email" class="form-control" id="guardian_email" value="<?=@$data['guardian_email'] ;?>">
													</div>
				
												</div>
												
											</div>
											
											<input	hidden type="text" class="form-control" id="s_id" value="<?=@$data['student_id'] ;?>">
											<div class="text-right">
                                            <a href="?nav=student_create"><button type="" class="btn btn-primary" id="student_create">Add</button> </a>
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