<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome Student!</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row">
		<div class="col-xl-3 col-sm-6 col-12">
			<a href="index.php?nav=attendence">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-primary border-primary">
								<i class="fe fe-users"></i>
							</span>

							<div class="dash-count">

							</div>
						</div>
						<div class="dash-widget-info">
							<h6 class="text-muted">Attendence</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<a href="index.php?nav=fee">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon text-primary border-primary">
								<i class="fe fe-users"></i>
							</span>

							<div class="dash-count">

							</div>
						</div>
						<div class="dash-widget-info">
							<h6 class="text-muted">Fee</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>

	</div>

	<div class="row">
		<div class="col-md-12 d-flex">

			<!-- Batch List -->
			<div class="card card-table flex-fill">
				<div class="card-header">
					<h4 class="card-title">Classes</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-center mb-0">
							<thead>
								<tr>

									<th>Batch Name</th>
									<th>Course Name</th>
									<th>Teacher</th>
									<th>Atteddence</th>
									<th>Lectures</th>
									<th class="">Class Work</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$email = $_SESSION['email'];
								$sql = "SELECT * FROM student Where student_email= '$email'";

								$qrun = mysqli_query($conn, $sql);

								while ($data = mysqli_fetch_array($qrun)) { 	?>

									<tr>
										<td>
											<h6>Batch Name</h6><?= $data['student_section']; ?>
										</td>
										<td>
											<h6>Course Name</h6><?= $data['student_class']; ?>
										</td>
										<td>
											<h6>Teacher</h6>Teacher
										</td>
										<td>
											<h6>Atteddence</h6>65%
										</td>
										<td class="">
											<h6>Lectures</h6>
											<div class="actions">
												<a class="btn btn-sm bg-primary-light" href="?nav=display_lecture&class_id=<?= $data['student_class']; ?>">
													<i class="fa fa-file"></i> Lectures
												</a>
											</div>

										</td>
										<td class="">
											<h6>Class Work</h6>
											<div class="actions">
												<a class="btn btn-sm bg-primary-light" href="index.php?nav=display_assignment&class_id=<?= $data['student_class']; ?>">
													<i class="fa fa-book"></i> Class Work
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