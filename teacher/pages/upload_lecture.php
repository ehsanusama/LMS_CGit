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
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Uploads</h4>
									</div>
									<div class="card-body">
										<form action="#" method="POST" role="form" enctype="multipart/form-data">
										<div class="form-group">

										<div class="form-group">
												<label>Type</label>
												<select class="select" name="type" >
												<option value="Lecture">Lecture</option>
												<option value="Assignment">Assignment</option>
												</select>
										    </div>
											<div class="form-group">
												<label>Title</label>
												<input type="text" class="form-control" name="upload_lecture_title" required>
											</div>
                                            <div class="form-group">
												<label>Batch</label>
												<select class="select" name="class_id" >
                                                <?php
                                                         	$id = $_SESSION['id'];
															$q="SELECT * FROM  study_group WHERE teacher_id = '$id' ";
															$q_run = mysqli_query($conn,$q);
															while($value = mysqli_fetch_array($q_run)){
																?>
																<option value="<?php echo $value ['class_id']; ?>">  <?php echo $value ['class_id']; ?></option>
																<?PHP
																	}
															?>
												</select>
										    </div>
										
											
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control"  id="" cols="60" rows="5" name="upload_lecture_description"></textarea>
											</div>
											<div class="form-group">
												<label>File </label>
												<input type="file" class="form-control" type="file" name="f" >
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary" name="upload_lecture_btn">Upload</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>