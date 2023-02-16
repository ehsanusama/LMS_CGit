<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome Dear Teacher!</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-primary border-primary">
							<i class="fe fe-book"></i>
						</span>
						<div class="dash-count">
							<h3>4</h3>
						</div>
					</div>
					<div class="dash-widget-info">
						<h6 class="text-muted">Courses</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-primary w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-success">
							<i class="fe fe-credit-card"></i>
						</span>
						<div class="dash-count">
							<?php
							$email = $_SESSION['email'];
							$id =  $_SESSION['id'];
							$sql = "SELECT COUNT(*) as teacher_id FROM study_group WHERE teacher_id='$id'";
							$qrun = mysqli_query($conn, $sql);
							$data = mysqli_fetch_array($qrun);

							?>
							<h3><?php echo $data['teacher_id']; ?></h3>
						</div>
					</div>
					<div class="dash-widget-info">

						<h6 class="text-muted">Assigned Study Groups</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-sm-6 col-12">
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


	<div class="row">
		<div class="col-md-6 d-flex">

			<!-- Batch List -->
			<div class="card card-table flex-fill">
				<div class="card-header">
					<h4 class="card-title">Assigned Study Groups</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Study Group Name</th>
									<th> Course</th>
									<th>Batch</th>
									<th>Teacher</th>
								</tr>
							</thead>
							<tbody>
								<?php


								$email = $_SESSION['email'];
								// echo $email;
								$id =  $_SESSION['id'];
								$sql = "SELECT * FROM study_group INNER JOIN teacher ON study_group.teacher_id = teacher.teacher_id  WHERE study_group.teacher_id ='$id' ";

								$qrun = mysqli_query($conn, $sql);
								while ($data = mysqli_fetch_array($qrun)) { 	?>
									<tr>

										<td><?= $data['study_group_name']; ?></td>
										<td><?= $data['class_id']; ?></td>
										<td><?= $data['section_id']; ?></td>
										<td><?= $data['teacher_fname']; ?> <?= $data['teacher_lname']; ?></td>

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
	<!-- /Recent Orders -->


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