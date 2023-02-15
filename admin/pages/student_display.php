<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Students</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Students</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<form action="#">
						<div class="row">
							<div class="col-xl-12">
								<div class="row">
									<div class="col-lg-10">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Select Course</label>
													<select class="select" id="course">


														<?php
														$q = "SELECT * FROM classes";
														$q_run = mysqli_query($conn, $q);
														while ($course = mysqli_fetch_array($q_run)) {
														?>
															<option value="<?= @$course['class_name']; ?>"> <?= @$course['class_name']; ?></option>
														<?PHP
														}
														?>
													</select>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="">Select Batch</label>
													<select class="select " id="batch">

														<?php
														$q = "SELECT * FROM section";
														$q_run = mysqli_query($conn, $q);
														while ($value = mysqli_fetch_array($q_run)) {
														?>
															<option value="<?= @$value['section_name']; ?>"> <?= @$value['section_name']; ?></option>
														<?PHP
														}
														?>
													</select>
												</div>
											</div>

										</div>
									</div>
									<div class="text-right">
										<a href="index.php?nav=student_dsiplay"><button type="" class="btn btn-primary" id="filter">Filter</button> </a>
									</div>
								</div>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">

			<!-- Recent Orders -->
			<div class="text-right mb-2">
				<a href="?nav=student_create"><button class="btn btn-secondary">Add Students</button></a>
			</div>

			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="datatable table table-hover table-center mb-0">
							<?php
							//  $sql = "SELECT * FROM student";
							$sql = "SELECT * FROM student";
							//echo $sql;
							$qrun = mysqli_query($conn, $sql);
							while ($data = mysqli_fetch_array($qrun)) :	?>
								<thead>
									<tr>
										<th>Id#</th>
										<th>Name</th>
										<th>Course</th>
										<th>Batch</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody id="table-data">

									<tr>
										<td>
											<?php echo getQR($data['student_id'], 120, 10); ?>
											<br>
											Student ID#: <?= $data['student_id'] ?></th>
										</td>
										<td><?= $data['student_fname']; ?> <?= $data['student_lname']; ?></td>
										<td><?= $data['student_class']; ?></td>
										<td><?= $data['student_section']; ?></td>
										<td><?= $data['student_phone']; ?></td>
										<td><a href="mailto:<?= $data['student_email'] ?>"><?= $data['student_email'] ?></a></td>

										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-success-light" href="?nav=student_create&edit=<?= $data['student_id']; ?>">
													<i class="fe fe-edit"></i> Edit
												</a>
												<a class="btn btn-sm bg-danger-light" href="?nav=student_display&student_delete=<?= $data['student_id']; ?>">
													<i class="fe fe-trash"></i> Delete
												</a>
											</div>
										</td>
									</tr>
								<?php endwhile;  ?>
								</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /Recent Orders -->

		</div>
	</div>
</div>