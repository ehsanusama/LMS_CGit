<div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
											<?php 
                                        	$email = $_SESSION['email']; 
                                            $sql = "SELECT * FROM teacher WHERE teacher_email ='$email'";
                                            $qrun = mysqli_query($conn, $sql);
											$data = mysqli_fetch_array($qrun);
                                            ?>
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="../uploads/<?=$data['teacher_pic']?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
                                        
                                      
										<h4 class="user-name mb-0"><?=$data['teacher_fname'] ;?> <?=$data['teacher_lname'] ;?></h4>
										<h6 class="text-muted"><?php echo $_SESSION['email']; ?></h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
										<div class="about-text"><?=$data['teacher_address'] ;?></div>
									</div>
									<div class="col-auto profile-btn">
										
										<a href="#" class="btn btn-primary">
											Edit
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details<?=$_SESSION['id']; ?>"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10"><?=$data['teacher_fname'] ;?> <?=$data['teacher_lname'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?=$data['teacher_email'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10"><?=$data['teacher_phone'] ;?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0"><?=$data['teacher_address'] ;?></p>
													</div>
												</div>
											</div>
											
												
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details<?=$_SESSION['id']; ?>" aria-hidden="true" role="dialog">
													
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form method="POST" role="form" enctype="multipart/form-data">
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" class="form-control" value="<?=@$data['teacher_fname']?>" name="fname">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text"  class="form-control" value="<?=@$data['teacher_lname']?>" name="lname">
																		</div>
																	</div>
																	
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>CNIC</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="<?=@$data['teacher_cnic']?>" name="cnic">
																			</div>
																		</div>
																	</div>
																	
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" value="<?=@$data['teacher_phone']?>" class="form-control" name="phone" >
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="<?=@$data['teacher_email']?>" name="email">
																		</div>
																	</div>
																	
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Image</label>
																			<input type="file" class="form-control" value="" name="f">
																		</div>
																	</div>

																	<div class="col-12">
																		<div class="form-group">
																		<label>Qualification</label>
																			<input type="text" class="form-control" value="<?=@$data['teacher_qualification']?>" name="qualification">
																		</div>
																	</div>
																	
			
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control" value="<?=@$data['teacher_address']?>" name="address">
																		</div>
																	</div>
																	
																</div>
																<input hidden type="text " value="<?=$_SESSION['id'];?>" name="id">
																<button type="submit" class="btn btn-primary btn-block" name="update_teacher" >Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>		