<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Teacher</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Teacher</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="text-right mb-2">
								<a href="?nav=teacher_create"><button class="btn btn-secondary">Add Teacher</button></a>	
							</div>							
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>CNIC</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php 

                                            $sql ="	SELECT * FROM teacher";
                                            $qrun = mysqli_query($conn, $sql);												
                                            while ($data = mysqli_fetch_array($qrun)):	?>
                                        <tr>
                                            <td><?=$data['teacher_fname'];  ?>	<?=$data['teacher_lname']; ?></td>
                                            <td><?=$data['teacher_email'] ;?></td>
                                            <td><?= $data['teacher_phone'] ;?></td>
											<td><?= $data['teacher_cnic'] ;?></td>
                                            <td class="text-right">
                                                <div class="actions">
                                                <a class="btn btn-sm bg-success-light"  href="?nav=teacher_create&edit=<?=$data['teacher_id'] ;?>">
                                                        <i class="fe fe-edit"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light" href="?nav=teacher_display&teacher_delete=<?=$data['teacher_id'] ;?>">
                                                        <i class="fe fe-trash" ></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
			                            <?php endwhile;?>
										    </tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>	