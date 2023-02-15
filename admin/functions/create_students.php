<?php

include ("../../db/conection.php");
$id= $_POST['s_id'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$batch = $_POST['batch'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$fphone = $_POST['fphone'];


if ($id == "") {
    $exist = "SELECT * FROM student WHERE student_email = '$email' ";
    $check = mysqli_query($conn, $exist);
    if(!(mysqli_num_rows($check)>0)){

                 foreach ($course as $key => $value) {
                         $query = "INSERT INTO student (student_fname, student_lname, student_class, student_section, student_gender, student_phone, student_email, student_password, guardian_name, guardian_phone)
                                VALUES('$name','$lname','$value' ,'$batch[$key]','$gender','$phone','$email','$password', '$fname' ,'$fphone')";
                                $query_run = mysqli_query($conn, $query);          
                }

                // $fetchid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT student_id FROM student WHERE student_email ='$email'"));
                // $stdid = $fetchid['student_id'];
                //  foreach ($course as $key => $value) {
                // $insert_course="INSERT INTO st_course_batch(student_id,class_id,section_id) VALUES ('$stdid','$value','$batch[$key]')";
                // $run = mysqli_query($conn, $insert_course);
                //          }
    if ($query_run) {
          
        echo "1";
    } 
    else {
        $er = mysqli_errno($conn, );
        echo $er;
    }

}

    else {
    echo"Student Already Exsist";
        }
}


    else {
        foreach ($course as $key => $cvalue) {
        $query = "UPDATE student SET student_fname='$name',student_lname='$lname',guardian_name='$fname',student_gender='$gender',student_phone='$phone',student_email='$email',student_password='$password',guardian_phone='$fphone',student_class='$cvalue',student_section='$batch[$key]' WHERE student_id = '$id'";
        $query_run = mysqli_query($conn, $query);
        }
        if ($query_run) {
            echo "2";
        }
        }
    
    

?> 