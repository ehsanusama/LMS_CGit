<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Upload Assignment/Notes</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Upload Assignment/Notes</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="container ">
						<div class="row justify-content-center">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Uploads</h4>
									</div>
									<div class="card-body">
										<?php if(isset($_GET['id']) ){ 
											 $id = $_GET['id'];
											 $q="SELECT * FROM upload_lectures WHERE upload_lecture_id='$id'";
											 $q_run = mysqli_query($conn,$q);
											 $data = mysqli_fetch_array($q_run);
											?>
										<form action="#" method="POST" role="form" enctype="multipart/form-data">
										<div class="form-group">
											<div class="form-group">
												<label>Name</label>
												<input hidden type="text" class="form-control" name="id" value="<?=@$data['upload_lecture_id'] ;?>" readonly>
												<input type="text" class="form-control" name="title" value="<?=@$data['upload_lecture_title'] ;?>" readonly>
											</div>

											<div class="form-group">
												<label>Batch</label>
												<input type="text" class="form-control" name="class_id" value="<?=@$data['class_id'] ;?>" readonly>
											</div>
											<div class="form-group">
												<label>Teacher</label>
												<input type="text" class="form-control" name="teacher_id" value="<?=@$data['teacher_id'] ;?>" readonly hidden>
											</div>
												
										</div>

											
											<div class="form-group">
												<label>File</label>
												<input type="file" class="form-control" name="f">
											</div>
											
											
											<div class="text-right">
												<button type="submit" class="btn btn-primary" name="std_upload_assignment">Upload</button>
											</div>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>