<?php include_once '../../db/conection.php'; ?>
<?php

$batch = $_REQUEST['section'];
$course = $_REQUEST['course'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];

//$course=$_REQUEST['student_class'];
# code...
$output = '<table border="1"><tr><th colspan="4">Student Attendence Repot</th></tr>';
$output .= '<tr><th>Std#</th><th>Name</th> <th>Batch</th><th>Course</th><th>Present</th><th>Absent</th></tr>';

$sql = "SELECT student.student_id,student.student_fname,student.student_lname, student.student_class,student.student_section FROM student
		INNER JOIN student_attendance ON student_attendance.student_id = student.student_id 
		WHERE student.student_class='$course' AND student.student_section ='$batch' AND  student_attendance.att_date BETWEEN '$from' AND '$to' GROUP BY student.student_id ";
$qrun = mysqli_query($conn, $sql);

while ($r = mysqli_fetch_assoc($qrun)) {
	$stdid = $r['student_id'];
	$present = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and  student_attendance.att_sts='present'"));
	$absent = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and student_attendance.att_sts='Absent'"));
	$output .= '<tr> <td>' . $r['student_id'] . '</td> <td> ' . $r['student_fname'] . ' ' . $r['student_lname'] . '</td> <td>' . $r['student_section'] . '</td> <td> ' . $r['student_class'] . '</td> <td>' . $present['student_id'] . '</td><td>' . $absent['student_id'] . '</td></tr>';
}

$output .= "</table>";
header('Content-Type: application/xls');
header('Content-Disposition:attachment;filename=Student_Attendence.xls');
echo $output;
?>

	
