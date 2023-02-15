<?php if (!empty($_REQUEST['nav'])) {
	$get_nav = $_REQUEST['nav'];
} else {
	$get_nav = 'home';
}
$page = "pages/" . $get_nav . ".php";
?>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title">
					<span>Manger</span>
				</li>
				<li class="active">
					<a href="index.php?nav=home"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				<li>
					<a href="index.php?nav=course_display"><i class="fe fe-book"></i> <span>Create Course</span></a>
				</li>
				<li>
					<a href="index.php?nav=batch_display"><i class="fe fe-credit-card"></i> <span>Create Batch</span></a>
				</li>
				<li>
					<a href="index.php?nav=teacher_display"><i class="fe fe-users"></i> <span>Teachers</span></a>
				</li>
				<li>
					<a href="index.php?nav=asign_batch"><i class="fe fe-credit-card"></i> <span>Asign Batch</span></a>
				</li>

				<li>
					<a href="index.php?nav=student_display"><i class="fe fe-user-plus"></i> <span>Students</span></a>
				</li>
				<li>
					<a href="index.php?nav=student_card"><i class="fe fe-user-plus"></i> <span>Student Card </span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-credit-card"></i> <span> Payment Section </span> <span class="menu-arrow"></span></a>
					<ul>
						<li>
							<a href="index.php?nav=student_fee"><i class="fe fe-user-plus"></i> <span>Student Fee </span></a>
						</li>
						<li>
							<a href="index.php?nav=student_feevoucher"><i class="fe fe-user-plus"></i> <span>Student Fee Vouchers</span></a>
						</li>
					</ul>
				</li>
				<li class="menu-title">
					<span>Reports</span>
				</li>

				<li>
					<a href="index.php?nav=student_attendence_repot"><i class="fe fe-user-plus"></i> <span>Student Attendence </span></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->