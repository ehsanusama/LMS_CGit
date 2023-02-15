<?php

include ("../../db/conection.php");
$id= $_POST['id'];
$b_name = $_POST['b_name'];
//$b_course = $_POST['b_course'];
$b_status = $_POST['b_status'];

if ($id == "") {
        $exist = "SELECT * FROM section WHERE section_name = '$b_name' ";
        $check = mysqli_query($conn, $exist);
        if(!(mysqli_num_rows($check)>0)){
        $query = "INSERT INTO section(section_name,section_status) VALUES('$b_name','$b_status')";
        $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "1";
    }
    else {
        echo "Something Went Wrong Try Again!!";
    }
}   else {
    echo"Batch Already Exsist";
        }
    }

    else {
        
        $query = "UPDATE section SET  section_name='$b_name',section_status='$b_status' WHERE section_id ='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo "2";
        }
        }
    
    

?> 