<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Assignments</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Assignments</li>
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
									<th>Batch Id</th>
									<th>Batch Name</th>
									<th class="text-right">Action</th>
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
											<h2 class="table-avatar">
												<a href=""><?= $data['student_section']; ?></a>
											</h2>
										</td>
										<td><?= $data['student_class']; ?></td>


										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-primary-light" href="index.php?nav=display_assignment&class_id=<?= $data['student_class']; ?>">
													<i class="fa fa-eye"></i> View
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