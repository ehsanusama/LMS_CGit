<?php include_once '../../db/conection.php';
$response = [];
if (!empty($_REQUEST['action'])) {
	if ($_REQUEST['action'] == "add_fee") {
		$data = [
			'amount' => $_REQUEST['amount'],
			'user_id' => $_REQUEST['user_id'],
			'student_id' => $_REQUEST['student_id'],
			'dated' => date('Y-m-d', strtotime($_REQUEST['dated'])),
			'course' => $_REQUEST['course'],
			'batch' => $_REQUEST['batch'],
			'notes' => $_REQUEST['notes'],
			'installment' => $_REQUEST['installment'],
		];

		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM fee WHERE installment='$_REQUEST[installment]' AND student_id='$_REQUEST[student_id]'")) > 0) {
			$response = [
				'sts' => 'danger',
				'msg' => 'Duplicate Installment count',
				'type' => 'error'
			];
		} else {
			if (insert_data($conn, "fee", $data)) {
				$response = [
					'sts' => 'success',
					'msg' => 'Fee Added',
					'type' => 'success',
					'print_id' => mysqli_insert_id($conn),
				];
			} else {
				$response = [
					'sts' => 'danger',
					'type' => 'error',
					'msg' => mysqli_error($conn),
				];
			}
		}
	}
} else {
	$response = [
		'sts' => 'danger',
		'msg' => 'no action is defined'
	];
}
echo json_encode($response);
