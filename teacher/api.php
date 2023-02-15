<?php
include_once("../functions/login.php");
include_once '../db/conection.php';
$response = [];
if (!empty($_REQUEST['action'])) {
	if ($_REQUEST['action'] == "mark_attendance_scan" and !empty($_REQUEST['student_id'])) {
		@$student_id = base64_decode($_REQUEST['student_id']);
		$teacher_id =  $_SESSION['id'];
		@$shift = $_REQUEST['shift'];
		$att_date = date('Y-m-d');
		$time = date('H:i:s');

		$q = mysqli_query($conn, "SELECT * FROM student_attendance WHERE student_id='$student_id' AND att_date='$att_date'");
		if (mysqli_num_rows($q) > 0) {
			$qq = mysqli_query($conn, "SELECT * FROM student_attendance WHERE student_id='$student_id' AND att_date='$att_date' ORDER BY att_id DESC LIMIT 1");
			$fetchLastAttendance = mysqli_fetch_assoc($qq);
			@$data = [
				'out_time' => $time
			];
			if (empty($fetchLastAttendance['out_time'])) {
				$query = update_data($conn, "student_attendance", $data, "att_id", $fetchLastAttendance['att_id']);
				if ($query) {
					$response = [
						"msg" => "Attendance Marked",
						"sts" => "Alert !",
						'icon' => 'success',
						"code" => "200",
					];
				} else {
					$response = [
						"msg" => mysqli_error($conn),
						"sts" => "Alert !",
						'icon' => 'warning',
						"code" => "404",
					];
				}
			} else {
				$response = [
					"msg" => "Attendance Already Marked",
					"sts" => "Alert !",
					'icon' => 'error',
					"code" => "200",
				];
			}
		} else {
			@$data = [
				'student_id' => $student_id,
				'teacher_id' => $teacher_id,
				'att_sts' => 'present',
				'att_date' => $att_date,
				'in_time' => $time,
				'timestamp' => date('Y-m-d H:i:s'),
			];

			$query = insert_data($conn, "student_attendance", $data);
			if ($query) {
				$response = [
					"msg" => "Attendance Marked",
					"sts" => "Alert !",
					'icon' => 'success',
					"code" => "200",
				];
			} else {
				$response = [
					"msg" => mysqli_error($conn),
					"sts" => "Alert !",
					'icon' => 'warning',
					"code" => "404",
				];
			}
		}
	}
} else {
	$response = [
		"message" => "No action defined",
		"status" => "Alert !",
		'icon' => 'warning',
		"code" => "404",
	];
}


echo json_encode($response);
