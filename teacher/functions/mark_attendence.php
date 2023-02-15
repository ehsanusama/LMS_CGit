<?php
include ("../../db/conection.php");
$id = $_POST['id'];
$std_id = $_POST['std_id'];
$status = $_POST['status'];
$date = $_POST['date'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
        if (empty($id)) {
        $query = "INSERT INTO student_attendance(att_sts, in_time, out_time, att_date, student_id) VALUES('$status' , '$check_in', '$check_out', '$date', '$std_id')";
        $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "1";
    }
    else {
        echo "Something Went Wrong Try Again!!";
    }
}
    else { 
        $query = " UPDATE student_attendance SET  att_sts='$status', in_time='$check_in', out_time ='$check_out',att_date= '$date',student_id='$std_id'  WHERE att_id='$id' ";
        
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo "2";
        }
    }
    
    

?> 