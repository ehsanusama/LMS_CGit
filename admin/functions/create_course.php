<?php

include ("../../db/conection.php");
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
$c_status = $_POST['c_status'];

    if ($c_id == "") {
        $exist = "SELECT * FROM classes WHERE class_name = '$c_name'";
        $check = mysqli_query($conn, $exist);
        if(!(mysqli_num_rows($check)>0)){
        $query = "INSERT INTO classes(class_name,class_status) VALUES('$c_name' , '$c_status')";
        $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "1";
    }
    else {
        echo "Something Went Wrong Try Again!!";
    }
}   else {
    echo"Course Already Exsist";
        }
    }
    else {
        $query = "UPDATE classes SET class_name='$c_name',class_status='$c_status' WHERE class_id ='$c_id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo "2";
        }
        }
    
    

?> 