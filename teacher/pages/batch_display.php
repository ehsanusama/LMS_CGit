<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Batches</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Batches</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
														
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													
													<th> Name</th>
													<th>Course</th>
													<th>Batch</th>
													
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
                            <?php 
                                        $id =  $_SESSION['id'];
                                        // echo $email;

                                        $sql = "SELECT * FROM study_group WHERE teacher_id ='$id'";
                                        

                                        $qrun = mysqli_query($conn, $sql);												
                                        while ($data = mysqli_fetch_array($qrun)){ 	?>
                                    <tr>
                                        
                                        <td><?=$data['study_group_name'] ;?></td>
                                        <td><?=$data['class_id'] ;?></td>
                                        <td><?=$data['section_id'] ;?></td>
                                        
                                        <td class="text-right">
                                            <div class="actions">
                                            
                                            <a class="btn btn-sm bg-primary-light"  href="?nav=students&class=<?=$data['class_id'] ;?>&section=<?=$data['section_id'] ;?> ">
                                            <i class="fa fa-view"></i> View
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
		                    <?php } ?>												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>