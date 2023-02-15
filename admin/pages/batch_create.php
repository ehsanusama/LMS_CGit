<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Create Batch</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Create Batch</li>
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
										<h4 class="card-title">Batch Details</h4>
									</div>
									<div class="card-body">
										<!-- /Update Batch -->
									<?php if(isset($_GET['edit'])){ 
											 $id = $_GET['edit'];
											 $q="SELECT * FROM section WHERE section_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
                                    }
											?>
									<form action="">
										<div class="form-group">
										

											<div class="form-group">
												<label>Batch Name</label>
												
												<input type="text" class="form-control" id="b_name" value="<?=@$data['section_name'] ;?>">

												<input hidden type="text" class="form-control" id="id" value="<?=@$data['section_id'] ;?>">
											</div>
											
											<!-- <div class="form-group">
												<label>Course</label>
												<select class="select" id="b_course">
													<?php
													$q="SELECT * FROM classes";
													$q_run = mysqli_query($conn,$q);
													while($data = mysqli_fetch_array($q_run)){
														?>
														<option value="<?=@$data ['class_name']; ?>">  <?=@$data ['class_name']; ?></option>
														<?PHP
															}
													?>
													
												</select>
											</div> -->
											
											<div class="form-group">
												<label>Status:</label>
												<select class="select" id="b_status">
													<option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
												</select>
											</div>
											
											
											<div class="text-right">
											<a href="?nav=batch_create">	<button type="" class="btn btn-primary" id="batch_create">Add</button></a>
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