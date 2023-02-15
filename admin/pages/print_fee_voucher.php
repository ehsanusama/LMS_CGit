<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Student Fee Voucher</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
					<li class="breadcrumb-item active">Student Fee Voucher</li>
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

					<h2 class="hidden-print">Print Voucher <a href="#!" onclick="window.print()"><i class="fa fa-print"></i></a></h2>
					<?php if (empty($_REQUEST['print_id'])) : ?>
						<center>
							<h3>Please choose Voucher to print</h3>
						</center>
					<?php exit();
					endif;
					$fetchFee = fetchRecord($conn, "fee", "id", $_REQUEST['print_id']);
					$fetchStudent = fetchRecord($conn, "student", "student_id", $fetchFee['student_id']);
					?>

					<table class="table table-bordered " style="width: 100%;" id="print-section">
						<tr>
							<th>Admin Copy
								<span style="float: right;"><?php getQRSMSTO($fetchStudent['student_phone'], "Dear " . strtoupper($fetchStudent['student_fname']) . ", Thank you for your fee submission.\r\n Voucher ID: " . $fetchFee['id'] . "\r\n Amount " . $fetchFee['amount'] . "\r\n Dated: " . date('l, d-M-Y', strtotime($fetchFee['dated'])) . "  Regards: CGit and TPWS", 80, 0); ?>

								</span>
							</th>
							<th>Student Copy
								<span style="float: right;"><?php getQRSMSTO($fetchStudent['student_phone'], "Dear " . strtoupper($fetchStudent['student_fname']) . ", Thank you for your fee submission.\r\n Voucher ID: " . $fetchFee['id'] . "\r\n Amount " . $fetchFee['amount'] . "\r\n Dated: " . date('l, d-M-Y', strtotime($fetchFee['dated'])) . "  Regards: CGit and TPWS", 80, 0); ?>

								</span>
							</th>
						</tr>
						<tr>
							<th>
								<img src="../uploads/header.jpeg" width="100%" alt="">
							</th>
							<th>
								<img src="../uploads/header.jpeg" width="100%" alt="">
							</th>
						</tr>
						<tr>
							<th>
								<table class="table table-bordered " style="width: 100%;">
									<tr>
										<td>Voucher #: </td>
										<td><?= $fetchFee['id'] ?></td>
									</tr>
									<tr>
										<td>Name: </td>
										<td><?= strtoupper($fetchStudent['student_fname']) ?> <?= strtoupper($fetchStudent['student_lname']) ?></td>
									</tr>
									<tr>
										<td>Course: </td>
										<td><?= strtoupper($fetchStudent['student_class']) ?></td>
									</tr>
									<tr>
										<td>Batch: </td>
										<td><?= strtoupper($fetchStudent['student_section']) ?></td>
									</tr>
									<tr>
										<td>Amount</td>
										<td><?= ($fetchFee['amount']) ?></td>
									</tr>
									<tr>
										<td>Installment</td>
										<td><?= ($fetchFee['installment']) ?></td>
									</tr>
									<tr>
										<td>Dated: </td>
										<td><?= date('l, d-M-Y', strtotime($fetchFee['dated'])) ?></td>
									</tr>
									<tr>
										<td>Notes: </td>
										<td><?= ($fetchFee['notes']) ?></td>
									</tr>
									<tr>
										<td>Signature: </td>
										<td>______________________________________</td>
									</tr>
								</table>
							</th><!-- admin copy -->
							<th>
								<table class="table table-bordered ">
									<tr>
										<td>Voucher #: </td>
										<td><?= $fetchFee['id'] ?></td>
									</tr>
									<tr>
										<td>Name: </td>
										<td><?= strtoupper($fetchStudent['student_fname']) ?> <?= strtoupper($fetchStudent['student_lname']) ?></td>
									</tr>
									<tr>
										<td>Course: </td>
										<td><?= strtoupper($fetchStudent['student_class']) ?></td>
									</tr>
									<tr>
										<td>Batch: </td>
										<td><?= strtoupper($fetchStudent['student_section']) ?></td>
									</tr>
									<tr>
										<td>Amount</td>
										<td><?= ($fetchFee['amount']) ?></td>
									</tr>
									<tr>
										<td>Installment</td>
										<td><?= ($fetchFee['installment']) ?></td>
									</tr>
									<tr>
										<td>Dated: </td>
										<td><?= date('l, d-M-Y', strtotime($fetchFee['dated'])) ?></td>
									</tr>
									<tr>
										<td>Notes: </td>
										<td></td>
									</tr>
									<tr>
										<td>Signature: </td>
										<td>______________________________________</td>
									</tr>
								</table>
							</th>
					</table>
					</th><!-- student copy -->
					</tr>
					</table>

					<script>
						window.print()
					</script>
				</div>
			</div>
			<!-- /Recent Orders -->

		</div>
	</div>
</div>