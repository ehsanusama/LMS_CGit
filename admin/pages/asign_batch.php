<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Study Group</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Study Group</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="text-right mb-2">
								<a href="?nav=asign_batch_create"><button class="btn btn-secondary">Assign </button></a>	
							</div>							
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
                                                    <th>Study Group Name</th>
													<th>Class </th>
													<th>Batch</th>
													<th>Teacher</th>
					
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php 


				$sql ="	SELECT study_group.study_group_id,study_group.study_group_name,study_group.class_id,study_group.section_id, teacher.teacher_fname, teacher.teacher_lname FROM study_group INNER JOIN teacher ON study_group.teacher_id = teacher.teacher_id ";
				$qrun = mysqli_query($conn, $sql);												
				while ($data = mysqli_fetch_array($qrun)){ 	?>
			<tr>
			    <td><?=$data['study_group_name'] ;?></td>
				<td><?=$data['class_id'] ;?></td>
				<td><?=$data['section_id'] ;?></td>
				<td><?= $data['teacher_fname'] ;?>  <?=$data['teacher_lname'] ;?></td>
				<td class="text-right">
					<div class="actions">
					<a class="btn btn-sm bg-success-light"  href="?nav=asign_batch_create&edit=<?=$data['study_group_id'] ;?>">
							<i class="fe fe-edit"></i> Edit
						</a>
						<a class="btn btn-sm bg-danger-light" href="?nav=asign_batch&assign_delete=<?=$data['study_group_id'] ;?>">
							<i class="fe fe-trash" ></i> Delete
						</a>
					</div>
				</td>
			</tr>
			<?php }

?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>