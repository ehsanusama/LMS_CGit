<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Students Attendence Repots</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Students</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row justify-content-center">
						<div class="col-md-5">
							<div class="card">
								<div class="card-body">
                                <form action="?nav=repots" method="post">
										<div class="form-group">
											<div class="form-group">
												<label>Course</label>
												<select class="select" name="course">
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
											</div>
												    <div class="form-group">
														<label>Batch</label>
														<select class="select " name="section" >	
														<?php
															$q="SELECT * FROM section";
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
													<label for="">From</label>
													<input type="date" class="form-control" name="from_date" >
												    </div>

                                                    <div class="form-group">
													<label for="">To</label>
													<input type="date" class="form-control" name="to_date" >
												</div>
											
											<div class="text-right">
											<button type="" class="btn btn-primary" id="">Filter</button>
											</div>
										</form>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>	