<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Attendence</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
					<li class="breadcrumb-item active">Attendence</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->


	<div class="content  container-fluid ">
		<div class="row">
			<div class="col-xl-3">
				<a href="#qr-modal" data-toggle="modal" title="check_in|<?= @$fetchUser['student_id'] ?>" class="qr-modal-btn">
					<div class="card">
						<div class="card-body">
							<span class="dash-widget-icon text-danger">
								<i class="fa fa-qrcode" aria-hidden="true"></i>
							</span>
							<div class="dash-widget-info">
								<h6 class="text-muted">
									<h6 class="text-danger">Scan Card</h6>
								</h6>
								<div class="progress progress-sm">
									<div class="progress-bar bg-danger w-50"></div>
								</div>

							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Individual Attendance</h4>
					</div>
					<div class="card-body">
						<!-- /Update Batch -->
						<?php if (isset($_GET['att_edit_id'])) {
							$id = $_GET['att_edit_id'];
							$q = "SELECT * FROM student_attendance WHERE att_id='$id'";
							$q_run = mysqli_query($conn, $q);
							$data = mysqli_fetch_array($q_run);
						}
						?>
						<form action="">
							<div class="form-group">


								<div class="form-group">
									<label>Student Name</label>

									<input class="form-control" list="lst" autocomplete="off" value="<?= @$data['student_id'] ?>" id="student_id" class="form-control" placeholder="Student ID" required>
									<datalist id="lst">
										<?php $q = mysqli_query($conn, "SELECT * FROM student");
										while ($r = mysqli_fetch_assoc($q)) :
										?>
											<option value="<?= $r['student_id'] ?>"><?= $r['student_fname'] ?> (<?= strtoupper($r['student_class']) ?>)</option>
										<?php endwhile; ?>
									</datalist>

									<input hidden class="form-control" value="<?= @$data['att_id'] ?>" id="id" class="form-control">
								</div>
								<div class="row">

									<div class="col-lg-12">
										<div class="row">
											<div class="col-md-6">
												<label>Mark Attendence</label>
												<div class="form-group">
													<select class="select" id="att_sts">
														<option value="Present">Present</option>
														<option value="Absent">Absent</option>
														<option value="Leave">Leave</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<label>Date</label>
												<div class="form-group">
													<input type="date" placeholder="Date" class="form-control" id="date" value="<?= @$data['att_date'] ?>">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">

									<div class="col-lg-12">
										<div class="row">
											<div class="col-md-6">
												<label>Check In</label>
												<div class="form-group">
													<input type="time" placeholder="Last Name" class="form-control" id="check_in" value="<?= @$data['in_time'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<label>Check Out</label>
												<div class="form-group">
													<input type="time" placeholder="Last Name" class="form-control" id="check_out" value="<?= @$data['out_time'] ?>">
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="text-right">
									<a href="?nav=mark_attendence"> <button type="" class="btn btn-primary" id="mark_attendence">Add</button></a>
								</div>
						</form>
						<!-- /Update Batch -->

						<!-- Create Batch -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Mark All Attendance</h4>
				</div>
				<div class="card-body">

					<form class="" method="post">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Choose Class</label>
									<select name="course" id="" class="form-control" required>
										<?php if (empty($fetchStudyGroup['class_id'])) : ?>
											<option value="">Choose Class</option>
										<?php else : ?>
											<option value="<?= $fetchStudyGroup['class_id'] ?>"><?= $fetchStudyGroup['class_id'] ?></option>
										<?php endif; ?>
										<?php
										$id =  $_SESSION['id'];
										$q = mysqli_query($conn, "SELECT * FROM study_group WHERE teacher_id='$id'");
										while ($r = mysqli_fetch_assoc($q)) :
										?>
											<option value="<?= $r['class_id'] ?>"><?= strtoupper($r['class_id']) ?></option>
										<?php endwhile; ?>
									</select>
								</div><!-- form-group -->
							</div><!-- col -->
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Choose Batch</label>
									<select name="batch" id="" class="form-control" required onchange="form.submit()">
										<option value="">Choose Batch</option>
										<?php $q = mysqli_query($conn, "SELECT * FROM study_group WHERE teacher_id='$id'");
										while ($r = mysqli_fetch_assoc($q)) :
										?>
											<option value="<?= $r['section_id'] ?>"><?= strtoupper($r['section_id']) ?></option>
										<?php endwhile; ?>
									</select>
								</div><!-- form-group -->
							</div><!-- col -->
						</div><!-- row -->

					</form>
					</form>
					<?php if (isset($_REQUEST['course']) and isset($_REQUEST['batch'])) {
						# code...
						$q = mysqli_query($conn, "SELECT * FROM student WHERE student_class='$_REQUEST[course]' AND student_section='$_REQUEST[batch]'");
					} else {
						$id = $_SESSION['id'];
						$getTeach = mysqli_query($conn, "SELECT * FROM study_group WHERE teacher_id='id'");
						$count = mysqli_num_rows($getTeach);
						$i = 1;
						$comma = ",";
						$groups = "";
						while ($fetchTeach = mysqli_fetch_assoc($getTeach)) {
							if ($i == $count) {
								$comma = "";
							}
							$groups .= "'" . $fetchTeach['class_id'] . "'" . $comma;
							$i++;
						}
						$q = mysqli_query($conn, "SELECT * FROM student WHERE student_class IN ($groups)");
					} ?>
					<hr>

					<form action="" method="post">
						<label>
							<input type="checkbox" id="checkAll">
							Check All
						</label>
						<div class="col-sm-6">
							<ol>

								<?php
								while (@$r = mysqli_fetch_assoc($q)) :
								?>
									<li>
										<label>
											<input type="checkbox" name="student_id[]" value="<?= @$r['student_id'] ?>">
											<img style="margin-top: -3px;margin-right: 3px: " src="../uploads/<?= $r['student_pic'] ?>" class="img img-responsive img-circle pull-left" width="25" height="25" alt="">&nbsp; <span class="pull-right"><?= $r['student_id'] ?>#: <?= $r['student_fname'] ?> <?= $r['student_lname'] ?></span> </label>
									</li>
								<?php endwhile; ?>
							</ol>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Mark Attendence</label>
									<select name="att_sts" id="" required class="form-control">
										<option value="">Mark Attendance</option>
										<option value="present">Present</option>
										<option value="absent">Absent</option>
										<option value="leave">Leave</option>
									</select>
								</div>
							</div><!-- col -->
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Date</label>
									<input type="date" class="dateField form-control" required name="att_date" placeholder="Date" autocomplete="off">
								</div>
							</div><!-- col -->
						</div><!-- row -->

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">In Time</label>
									<input type="time" class="form-control" name="in_time" value="<?php if (!empty($fetchAttendance['in_time'])) {
																										echo $fetchAttendance['in_time'];
																									} ?>">
								</div>
							</div><!-- col -->
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Out Time</label>
									<input type="time" class="form-control" name="out_time" value="<?php if (!empty($fetchAttendance['out_time'])) {
																										echo $fetchAttendance['out_time'];
																									} ?>">
								</div>
							</div><!-- col -->
						</div><!-- row -->
						<div class="text-right">
							<button class="btn btn-primary" name="mark_all_att">Mark All</button>
						</div>
					</form>





				</div>
			</div>

		</div>
	</div>








	<div class="row">
		<div class="col-md-12">

			<div class="text-right mb-2">
				<a href="includes/export_student_list.php?export_student_list"><button class="btn btn-secondary">Export Csv</button></a>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Id#</th>
									<th>Student</th>
									<th>Status</th>
									<th>Dated</th>
									<th>Check In</th>
									<th>Check Out</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<?php $q = mysqli_query($conn, "SELECT * FROM student_attendance");

								while ($att = mysqli_fetch_assoc($q)) :
									$output = "";
									$count = $sum = 0;
									if (strtolower($att['att_sts']) == "absent") {
										# code...
										$sts = '<label class="label label-danger">Absent</label>';
									} elseif (strtolower($att['att_sts']) == "present") {
										$sts = '<label class="label label-success">Present</label>';
									} else {
										$sts = '<label class="label label-warning">Leave</label>';
									}
									$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE student_id='$att[student_id]'"));
									// echo "SELECT * FROM student WHERE student_id='$att[student_id]'";
									if (!empty($att['in_time'])) {
										$in_time = date('h:i a', strtotime($att['in_time']));
									} else {
										$in_time = "--";
									}
									if (!empty($att['out_time'])) {
										$out_time = date('h:i a', strtotime($att['out_time']));
									} else {
										$out_time = "--";
									}
								?>
									<tr>
										<td><?= $att['att_id'] ?></td>
										<td>
											<?= $r['student_fname'] ?> <?= $r['student_lname'] ?>
										</td>
										<th><?= strtoupper($att['att_sts']) ?></th>
										<td><?= date('l, d-M-Y', strtotime($att['att_date'])) ?></td>
										<td><?= $in_time ?></td>
										<td><?= $out_time ?></td>
										<td><a href="index.php?nav=<?= $_REQUEST['nav'] ?>&att_edit_id=<?= $att['att_id'] ?>">Edit</a> | <a class="text-danger" href="index.php?nav=<?= $_REQUEST['nav'] ?>&att_del_id=<?= $att['att_id'] ?>">Delete</a></td>
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


<div class="modal fade" id="qr-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Scan QR Code</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

			</div>
			<div class="modal-body" id="qr-modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>