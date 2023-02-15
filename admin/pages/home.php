<div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										
										<div class="dash-count">
											
										<?php 
											function countnumbers($name){
											$sql = "SELECT COUNT(*) FROM $name";
											include("../db/conection.php");
											$qrun = mysqli_query($conn, $sql);
											$data = mysqli_fetch_array($qrun);
											?><h3><?php echo $data[0]; ?></h3><?php
											}
											
											countnumbers("teacher");
											?>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Teachers</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
										<?php countnumbers("student");?>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Students</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
										<?php countnumbers("section");?>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Batch</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
										<?php countnumbers("classes");?>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Courses</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Teachers List -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Batches List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Batch Id</th>
													<th>Name</th>
												</tr>
											</thead>
											<tbody>
													<?php 
													$sql ="	SELECT * FROM section ORDER BY section_id DESC LIMIT 5";
													//include ("../db/conection.php");
													$qrun = mysqli_query($conn, $sql);												
													while ($data = mysqli_fetch_array($qrun)){ 	?>
														<tr>
															<td><?=$data['section_name'];  ?></td>
															<td><?=$data['section_status'] ;?></td>
															
															
														</tr>
													<?php }		?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						<!-- Teachers List -->
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title">Courses List</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Course Id</th>
												<th>Course Name</th>
												<th>Status</th>
												
											</tr>
										</thead>
										<tbody>
										<?php 
													$sql ="	SELECT * FROM classes ORDER BY class_id DESC LIMIT 5";
													//include("../db/conection.php");
													$qrun = mysqli_query($conn, $sql);												
													while ($data = mysqli_fetch_array($qrun)){ 	?>
														<tr>
															<td><?=$data['class_id'];  ?></td>
															<td><?=$data['class_name'] ;?></td>
															<td><?=$data['class_status'] ;?></td>
															
															
														</tr>
													<?php }		?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /Recent Orders -->
						</div>
					</div>
				</div>	