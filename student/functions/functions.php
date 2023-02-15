<?php
function getMessage($msg, $sts)
{
	if (!empty($msg)) {
		echo "<script type='text/javascript'>
	swal('Alert', '$msg', '$sts');
	</script>";
	}
}
?>
<?php
//=================================Lecture Uploads===================================================
if (isset($_REQUEST['std_upload_assignment'])) {
	# code...
	$id = $_REQUEST['id'];
	$title = mysqli_real_escape_string($conn, strip_tags($_REQUEST['title']));
	$class_id = $_REQUEST['class_id'];
	$teacher_id = $_REQUEST['teacher_id'];
	$std_id = $_SESSION['email'];
	$file = $_FILES['f'];
	$folder = "../uploads/assignmetns/";
	$file_name = $file['name'];
	$temp_name = $file['tmp_name'];
	$explode = explode('.', $file_name);
	$length = count($explode);
	$ext = $explode[$length - 1];
	$new_file_name = md5(uniqid()) . "." . $ext;
	$path = $folder . $new_file_name;

	if (!$temp_name) {
		$sts = "warning";
		$msg = "Choose File first";
	} else {
		if ($ext == 'zip' or $ext == "rar" or $ext == "pdf" or $ext == "doc" or $ext == "docx") {
			# code...
			move_uploaded_file($temp_name, $path);
			$q = mysqli_query($conn, "INSERT INTO assignment (assignment_id,title,teacher_id,class_id,student_id,file_name) VALUES('$id','$title','$teacher_id', '$class_id', '$std_id','$new_file_name')");
			if ($q) {
				$msg = "Assignment has been Uploaded";
				$sts = "success";
?> <script>
					setTimeout(function() {
						window.location.href = "?nav=display_assignment&class_id=<?= $class_id; ?>";
					}, 3000);
				</script> <?php

						} else {
							$msg = mysqli_error($conn);
							$sts = "error";
							echo $msg;
						}
					} //check extension zip or rar
					else {
						$msg = "Only .zip or .rar file extensions Allowed";
						$sts = "info";
						echo $msg;
					} //check extension zip or rar
				} //else when file choosed

			} //isset
			//=================================/Lecture Uploads===================================================


			if (isset($_REQUEST['update_student'])) {
				# code...
				$student_edit_id = $_REQUEST['id'];
				$student_fname = $_REQUEST['fname'];
				$student_lname = $_REQUEST['lname'];
				$student_phone = $_REQUEST['phone'];
				$student_email = $_REQUEST['email'];
				$student_address = mysqli_real_escape_string($conn, $_REQUEST['student_address']);
				@$guardian_name = $_REQUEST['guardian_name'];
				@$guardian_email = $_REQUEST['guardian_email'];
				$student_dob = $_REQUEST['student_dob'];
				$file = $_FILES['f'];
				$folder = "../uploads/";
				$file_name = $file['name'];
				$temp_name = $file['tmp_name'];
				$explode = explode('.', $file_name);
				$length = count($explode);
				$ext = $explode[$length - 1];
				$new_file_name = md5(uniqid()) . "." . $ext;
				$path = $folder . $new_file_name;
				if (!$temp_name) {
					$q = mysqli_query($conn, "UPDATE student SET  student_fname='$student_fname',student_lname='$student_lname',student_phone='$student_phone',student_dob='$student_dob',student_email='$student_email',student_address='$student_address',guardian_name='$guardian_name',guardian_email='$guardian_email' WHERE student_id='$student_edit_id'");
				} else {

					move_uploaded_file($temp_name, $path);
					$q = mysqli_query($conn, "UPDATE student SET  student_fname='$student_fname',student_lname='$student_lname',student_phone='$student_phone',student_dob='$student_dob',student_email='$student_email',student_address='$student_address',student_pic='$new_file_name',guardian_name='$guardian_name',guardian_email='$guardian_email' WHERE student_id='$student_edit_id'");
				}
				if ($q) {
					# code...

					$msg = "Student Record has been Updated...";
					$sts = "success";
							?><script>
			setTimeout(function() {
				window.location.href = "?nav=profile";
			}, 2000);
		</script> <?php

				} else {
					$msg = mysqli_error($dbc);
					$sts = "danger";
				}
			}
					?>