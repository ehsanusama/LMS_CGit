
<?php 
 function getMessage($msg,$sts){
   if (!empty($msg)) {
	echo "<script type='text/javascript'>
	swal('Alert', '.$msg.', '$sts');
	</script>";
   }
	

 }
?>
<?php 
//=================================Lecture Uploads===================================================
	  if (isset($_REQUEST['upload_lecture_btn'])) {
	  	# code...
	  	$upload_lecture_title = mysqli_real_escape_string($conn,strip_tags($_REQUEST['upload_lecture_title']));
	  	$upload_lecture_description = mysqli_real_escape_string($conn,strip_tags($_REQUEST['upload_lecture_description']));
	  	$class_id = $_REQUEST['class_id'];
			$type = $_REQUEST['type'];
		 // $email = $_SESSION['email'];
	  		$teacher_id = $_SESSION['id'];
	  		$file=$_FILES['f'];
			$folder="../uploads/lectures/";
			$file_name=$file['name'];
			$temp_name=$file['tmp_name'];
			$explode= explode('.', $file_name);
			$length=count($explode);
			 $ext = $explode[$length-1];
			 $new_file_name = md5(uniqid()).".".$ext;
			 $path= $folder.$new_file_name;

			if(!$temp_name){
				$sts="warning";
				$msg="Choose File first";
				
				
			}else{
				if ($ext=='zip' OR $ext=="rar" OR $ext=="pdf" OR $ext=="doc" OR $ext=="docx") {
					# code...
					move_uploaded_file($temp_name, $path);
					$q=mysqli_query($conn,"INSERT INTO upload_lectures(teacher_id,class_id, upload_lecture_title, upload_lecture_description,upload_lecture_file,type) VALUES('$teacher_id', '$class_id', '$upload_lecture_title', '$upload_lecture_description','$new_file_name','$type')");	
					if ($q) {
						# code...
						
						$msg="Lecture has been Uploaded...";
						$sts="success";
						?> <script>setTimeout(function(){ window.location.href="?nav=display_lecture";},3000); </script> <?php

					}else{
						$msg = mysqli_error($conn);
						$sts="error";
                        echo $msg;
					}

				}//check extension zip or rar
				else{
					$msg="Only .zip or .rar file extensions Allowed";
					$sts="info";
                    echo $msg;
				}//check extension zip or rar
			}//else when file choosed

	  }//isset
//=================================/Lecture Uploads===================================================


if (isset($_REQUEST['marks_upload'])){
			$student = $_REQUEST['student'];
			$class = $_REQUEST['class_id'];
			$marks = $_REQUEST['obtain_marks'];
			$q=mysqli_query($conn,"UPDATE assignment SET marks='$marks' WHERE class_id='$class' and  student_id='$student'");	
			if ($q) {
				$msg="Marks Updated";
				$sts="success";
				}
				else{
					$msg = "Select Students First";
					$sts="error";
					echo $msg;

				}	


}

if (isset($_REQUEST['att_del_id'])){
    $value = $_REQUEST['att_del_id'];
$q = "DELETE FROM student_attendance WHERE att_id = '$value' ";
    $er = mysqli_error($conn);
    $q_run=mysqli_query($conn, $q);
    if($q_run){
                $msg="Recod Deleted";
				$sts="success";
				?>
				 <script>
					setTimeout(function(){ window.location.href="?nav=mark_attendence"},2000);
				 </script>
				<?php

        }

    }

?>
	   <!-- Attendance Module -->
	   <?php if (isset($_REQUEST['mark_all_att'])){
			$att_date = $_REQUEST['att_date'];
			$att_sts = $_REQUEST['att_sts'];
			$student_ids = $_REQUEST['student_id'];
			$in_time = (empty($_REQUEST['in_time'])?"":date('H:i:s',strtotime($_REQUEST['in_time'])));
			$out_time = (empty($_REQUEST['out_time'])?"":date('H:i:s',strtotime($_REQUEST['out_time'])));
			$id = $_SESSION['id'];
			$teacher_id = $id;
			foreach ($student_ids as $id) {
				if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student_attendance WHERE att_date='$_REQUEST[att_date]' AND student_id='$id'"))==0) {
				$q=mysqli_query($conn,"INSERT INTO student_attendance(att_date,att_sts,student_id,teacher_id,in_time,out_time) VALUES('$att_date','$att_sts','$id','$teacher_id','$in_time','$out_time')");
				}
			}
			if (@$q) {
				# code...
				$msg="Attendance Marked Successfully..";
				$sts="success";
			}else{
				$msg=mysqli_error($conn);
				$sts="danger";
			}
		} ?>
<!-- Update Teacher -->
	<?php 
	  if (isset($_REQUEST['update_teacher'])) {
			$teacher_edit_id =$_REQUEST['id'];
	  		$teacher_fname=$_REQUEST['fname'];
			$teacher_lname=$_REQUEST['lname'];
			$teacher_phone=$_REQUEST['phone'];
			$teacher_cnic=$_REQUEST['cnic'];
			$teacher_email=$_REQUEST['email'];
			//$teacher_password=$_REQUEST['teacher_password'];
			//$teacher_gender=$_REQUEST['gender'];
			$teacher_address=mysqli_real_escape_string($conn,$_REQUEST['address']);
			$teacher_qualification=mysqli_real_escape_string($conn,$_REQUEST['qualification']);
			$file=$_FILES['f'];
			$folder="../uploads/";
			$file_name=$file['name'];
			$temp_name=$file['tmp_name'];
			$explode= explode('.', $file_name);
			$length=count($explode);
			 $ext = $explode[$length-1];
			 $new_file_name = md5(uniqid()).".".$ext;
			 $path= $folder.$new_file_name;
			if(!$temp_name){
				$q=mysqli_query($conn,"UPDATE teacher SET  teacher_fname='$teacher_fname',teacher_lname='$teacher_lname',teacher_phone='$teacher_phone',teacher_cnic='$teacher_cnic',teacher_email='$teacher_email',teacher_address='$teacher_address',teacher_qualification='$teacher_qualification' WHERE teacher_id='$teacher_edit_id'");	
			}else{
				move_uploaded_file($temp_name, $path);
				$q=mysqli_query($conn,"UPDATE teacher SET  teacher_fname='$teacher_fname',teacher_lname='$teacher_lname',teacher_phone='$teacher_phone',teacher_cnic='$teacher_cnic',teacher_email='$teacher_email',teacher_address='$teacher_address',teacher_qualification='$teacher_qualification',teacher_pic='$new_file_name' WHERE teacher_id='$teacher_edit_id'");	
			}
			if ($q) {
				$msg="Teacher Record has been Updated";
				$sts="success";
				?><script>setTimeout(function(){ window.location.href="?nav=profile";},7000); </script> <?php
			}else{
				$msg = mysqli_error($conn);
				$sts="danger";
			}
			
	  }
	   ?>
	<!-- ************* Teacher Module Ends ************** -->
