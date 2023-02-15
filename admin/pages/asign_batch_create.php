<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Study Group</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Study Group</li>
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
										<h4 class="card-title">Study Group  Details</h4>
									</div>
									<div class="card-body">
										<!-- /Update Batch -->
									<?php if(isset($_GET['edit'])){ 
											 $id = $_GET['edit'];
											 $q="SELECT * FROM study_group WHERE study_group_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
                                    }
											?>
									<form action="">
										<div class="form-group">
												
											<div class="form-group">
												<label>Study Group Name</label>
												<input type="text" class="form-control" id="b_name" value="<?=@$data['study_group_name'] ;?>">
												<input hidden type="text" class="form-control" id="id"value="<?=@$data['study_group_id'] ;?>">
											</div>
											<div class="form-group">
												<label>Course</label>
												<select class="select" id="b_course">
													<?php
													$q="SELECT * FROM classes WHERE class_status='Active'";
													$q_run = mysqli_query($conn,$q);
													while($data = mysqli_fetch_array($q_run)){
														?>
														<option value="<?=@$data ['class_name']; ?>">  <?=@$data ['class_name']; ?></option>
														<?PHP
															}
													?>
													
												</select>
											</div>
												<div class="form-group">
														<label>Batch</label>
														<select class="select " id="section" >	
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
												<label>Teacher</label>
												<select class="select" id="teacher_id">
													<?php
													$q="SELECT * FROM teacher";
													$q_run = mysqli_query($conn,$q);
													while($data = mysqli_fetch_array($q_run)){
														?>
														<option value="<?=@$data ['teacher_id']; ?>">  <?=@$data ['teacher_fname']; ?> <?=@$data ['teacher_lname']; ?></option>
														<?PHP
															}
													?>
													
												</select>
											</div>

											
											
											

											<div class="text-right">
											<a href="?nav=assign_batch_create">	<button type="" class="btn btn-primary" id="assign_batch_create">Add</button></a>
											</div>
										</form>
										<!-- /Update Batch -->
											
										<!-- Create Batch -->
									</div>
								</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>