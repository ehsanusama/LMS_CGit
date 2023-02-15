<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Upload Lecture </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Upload Lecture </li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
                            <div class="text-right mb-2">
								<a href="?nav=upload_lecture"><button class="btn btn-secondary">Upload </button></a>	
							</div>			
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
                                                    <th>Class</th>
													<th>Teacher</th>
													<th class="text-right">File</th>
													
												</tr>
											</thead>
											<tbody>
                            <?php 
                                        $email = $_SESSION['email'];
										$id = $_SESSION['id'];
                                        // echo $email
                                        $sql = "SELECT upload_lectures.upload_lecture_id, upload_lectures.upload_lecture_title,upload_lectures.class_id,upload_lectures.upload_lecture_file,teacher.teacher_fname  FROM upload_lectures
                                        INNER JOIN teacher  ON teacher.teacher_id = upload_lectures.teacher_id
                                        WHERE upload_lectures.teacher_id = '$id' and type ='Lecture' ";
										//echo $sql;
                                        $qrun = mysqli_query($conn, $sql);												
                                        while ($data = mysqli_fetch_assoc($qrun)){ 	?>
                                    <tr>
                                        <td><?=$data['upload_lecture_id'] ;?></td>
                                        <td><?=$data['upload_lecture_title'] ;?></td>
                                        <td><?=$data['class_id'] ;?></td>
                                        <td><?=$data['teacher_fname'] ;?></td>
                                        <td class="text-right"><a class="btn btn-sm bg-primary-light" href="../uploads/lectures/<?=$data['upload_lecture_file']?>" download ><i class="fa fa-download"></i> Download</a></td>
                                    
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