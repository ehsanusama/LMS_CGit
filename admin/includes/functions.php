<?php
function getMessage($msg, $sts)
{
  if (!empty($msg)) {
    echo "<script type='text/javascript'>
	swal('Recod', '.$msg.', '$sts');
	</script>";
  }
}
//========================== Alert Display=========================

//====================== Delete function==================================
function delete($table, $id, $value)
{
  include("../db/conection.php");
  $q = "DELETE FROM $table WHERE $id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = "has been Deleted";
    $sts = "success";
  }
}
//======================/Delete function end==================================

//======================Course Delete=========================================

if (isset($_REQUEST['course_delete'])) {
  $value = $_REQUEST['course_delete'];
  $q = "DELETE FROM classes WHERE class_id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = " has been Deleted";
    $sts = "success";
  }
}

//======================Course Delete==================================

//======================Teacher Delete=========================================

if (isset($_REQUEST['teacher_delete'])) {

  $value = $_REQUEST['teacher_delete'];
  $q = "DELETE FROM teacher WHERE teacher_id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = "Recod Record has been Deleted";
    $sts = "success";
  }
}

//======================Teacher Delete==================================

//======================Batch Delete=========================================

if (isset($_REQUEST['batch_delete'])) {

  $value = $_REQUEST['batch_delete'];

  $q = "DELETE FROM section WHERE section_id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = "Recod Record has been Deleted";
    $sts = "success";
  }
}

//======================Batch Delete==================================

//======================Batch Delete=========================================

if (isset($_REQUEST['student_delete'])) {

  $value = $_REQUEST['student_delete'];

  $q = "DELETE FROM student WHERE student_id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = "Recod Record has been Deleted";
    $sts = "success";
  }
}

//======================/Batch Delete==================================

if (isset($_REQUEST['assign_delete'])) {

  $value = $_REQUEST['assign_delete'];
  $q = "DELETE FROM study_group WHERE study_group_id = $value ";
  $q_run = mysqli_query($conn, $q);
  if ($q_run) {
    $msg = "Recod Record has been Deleted";
    $sts = "success";
  }
}

//======================/Batch Delete==================================
if (isset($_REQUEST['update_admin'])) {
  $admin_edit_id = $_REQUEST['id'];
  $admin_fname = $_REQUEST['fname'];
  $admin_lname = $_REQUEST['lname'];
  $admin_phone = $_REQUEST['phone'];
  $admin_cnic = $_REQUEST['cnic'];
  $admin_email = $_REQUEST['email'];
  $admin_address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $q = mysqli_query($conn, "UPDATE admin SET  admin_fname='$admin_fname',admin_lname='$admin_lname',admin_phone='$admin_phone',admin_cnic_no='$admin_cnic',admin_email='$admin_email',admin_address='$admin_address' WHERE admin_id='$admin_edit_id'");
  if ($q) {
    # code...
    $msg = "Record has been Updated";
    $sts = "success";
?><script>
      setTimeout(function() {
        window.location.href = "?nav=profile";
      }, 2000);
    </script> <?php
            } else {
              $msg = mysqli_error($conn);
              $sts = "danger";
            }
          }
              ?>