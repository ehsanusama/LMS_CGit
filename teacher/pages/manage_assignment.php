<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Manage Assignment</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Manage Assignment</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						<?php if(isset($_GET['class_id'])){ 
											 $id = $_GET['class_id'];
											 $q="SELECT * FROM assignment WHERE class_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
											?>
						<div class="text-right mb-2">
								<a href="?nav=mark_assignment&class_id=<?=$data['class_id'] ;?>"><button class="btn btn-secondary">Mark Assignment</button></a>	
							</div>						 -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Batch</th>

													<th>File</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
											
												<tr>
													<td><?=$data['student_id'] ;?></td>
													<td><?=$data['class_id'] ;?></td>
													<td><a class="btn btn-sm bg-primary-light" href="../uploads/assignments/<?=$data['file_name']?>" download ><i class="fa fa-download"></i> Download</a></td>
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light"  href="?nav=mark_assignment">
																<i class="fe fe-check"></i> Check
															</a>
														</div>
													</td>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>