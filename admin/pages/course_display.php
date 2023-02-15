<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Courses</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Courses</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="text-right mb-2">
								<a href="?nav=course_create"><button class="btn btn-secondary">Add Course</button></a>	
							</div>							
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Courses Id</th>
													<th>Courses Name</th>
													<th>Status</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
                                                $sql ="	SELECT * FROM classes";
												//include ("../db/conection.php");
												$qrun = mysqli_query($conn, $sql);												
												while ($data = mysqli_fetch_assoc($qrun)):	?>
											<tr>
												<td><?=$data['class_id'] ;?></td>
												<td><?=$data['class_name'] ;?></td>
												<td><?=$data['class_status'] ;?></td>
												<td class="text-right">
													<div class="actions">
													<a class="btn btn-sm bg-success-light"  href="?nav=course_create&edit=<?=$data['class_id'] ;?>">
															<i class="fe fe-edit"></i> Edit
														</a>
														<a class="btn btn-sm bg-danger-light" href="?nav=course_display&course_delete=<?=$data['class_id'] ;?>">
															<i class="fe fe-trash" ></i> Delete
														</a>
														
													</div>
												</td>
											</tr>
											<?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>	