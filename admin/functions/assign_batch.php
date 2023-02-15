<?php

include ("../../db/conection.php");
$id= $_POST['id'];
$b_name = $_POST['b_name'];
$b_course = $_POST['b_course'];
$batch = $_POST['batch'];
$b_teacher = $_POST['b_teacher'];

if ($id == "") {
        $exist = "SELECT * FROM study_group WHERE study_group_name = '$b_name' ";
        $check = mysqli_query($conn, $exist);
        if(!(mysqli_num_rows($check)>0)){
        $query = "INSERT INTO study_group (study_group_name,class_id,section_id,teacher_id) VALUES('$b_name','$b_course','$batch','$b_teacher')";
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
        $query = "UPDATE study_group SET  study_group_name='$b_name',class_id='$b_course',section_id='$batch',teacher_id='$b_teacher' WHERE study_group_id ='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo "2";
        }
        }
    
    

?> 