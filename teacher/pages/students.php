<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Manage Attendance</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Manage Attendance</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<!-- <div class="text-right mb-2">
								<a href="uploads.php"><button class="btn btn-secondary">Upload</button></a>	
							</div>							 -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Course</th>
													<th>Batch</th>
													
													<th>Email</th>
													
												</tr>
											</thead>
											<tbody>
											<?php if(isset($_GET['class']) && isset($_GET['section'])){ 
											$id = $_GET['class'];
											$sql = "SELECT * FROM student WHERE student_class='$id'";
											$q_run = mysqli_query($conn,$sql);
											 while ($data = mysqli_fetch_array($q_run)){ 	?>
											
												<tr>
													<td><?=$data['student_fname'] ;?> <?=$data['student_lname'] ;?></td>
													<td><?=$data['student_class'] ;?></td>
													<td><?=$data['student_section'] ;?></td>
													<td><?=$data['student_email'] ;?></td>
													
												</tr>
												<?php }} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>	