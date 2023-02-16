<?php include_once '../../db/conection.php'; ?>
<?php if (isset($_REQUEST['export_student_list'])) {
	# code...
	$output = '<table border="1"><tr><th colspan="4">Attendance Report</th></tr>';
	$output .= '<tr><th>Att#</th><th>Student Details</th> <th>Attendance Status</th><th>Dated</th><th>Checked IN</th><th>Checked OUT</th></tr>';
	$q = mysqli_query($conn, "SELECT * FROM student_attendance");

	while ($att = mysqli_fetch_assoc($q)) {
		$count = $sum = 0;
		$sts = strtoupper($att['att_sts']);
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
		$r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE student_id='$att[student_id]'"));
		$output .= '<tr> <td>' . $att['att_id'] . '</td> <td> ' . $r['student_fname'] . ' ' . $r['student_lname'] . '</td> <td>' . $sts . '</td> <td>' . date('l, d-M-Y', strtotime($att['att_date'])) . '</td> <td>' . $in_time . '</td><td>' . $out_time . '</td></tr>';
	}


	$output .= "</table>";
	header('Content-Type: application/xls');
	header('Content-Disposition:attachment;filename=attendance_report.xls');
	echo $output;
} ?>

	
