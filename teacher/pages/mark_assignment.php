<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Mark Assignment</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Mark Assignment</li>
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
										<h4 class="card-title">Mark Assignment</h4>
									</div>
									<div class="card-body">
                                            <?php if(isset($_GET['class_id'])){ 
											 $id = $_GET['class_id'];
											//  $q="SELECT * FROM assignment WHERE class_id='$id'";
											//  $q_run = mysqli_query($conn,$q);
											//  $data = mysqli_fetch_array($q_run);
											?>
										<form action="" method="POST">
                                        <div class="form-group">
												<label>Class</label>
												<input type="text" class="form-control" min="0" name="class_id" value="<?=$id?>" readonly>
											</div>

                                        <div class="form-group">
												<label>Student</label>
												<select class="select" name="student" required>
                                                    <option value="0">Select Students</option>
                                                         <?php
															$q="SELECT * FROM assignment WHERE class_id='$id' ";
															$q_run = mysqli_query($conn,$q);
															while($value = mysqli_fetch_array($q_run))
                                                            {
																?>
																<option value="<?php echo $value ['student_id']; ?>">  <?php echo $value ['student_id']; ?></option>
																<?PHP
																	}
															?>
                                                </select>
    										    </div>
										    <div class="form-group">
												<label>Obtain Marks</label>
												<input type="text" onkeypress="return /[0-9]/i.test(event.key)"  class="form-control" min="0" name="obtain_marks" required>
											</div>
											<div class="form-group">
												<label>Total Marks</label>
												<input type="number" class="form-control" min="0">
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary" name="marks_upload">Upload</button>
											</div>
										</form>
                                        <?php  }?>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>