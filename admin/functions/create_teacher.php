<?php

include ("../../db/conection.php");
$id= $_POST['t_id'];
$t_name = $_POST['t_name'];
$t_lname = $_POST['t_lname'];
$t_gender = $_POST['t_gender'];
$t_cnic = $_POST['t_cnic'];
$t_email = $_POST['t_email'];
$t_phone = $_POST['t_phone'];
$t_password = $_POST['t_password'];
$t_adress = $_POST['t_adress'];
$t_qua = $_POST['t_qua'];
// $b_status = $_POST['b_status'];

    if ($id == "") {
        $exist = "SELECT * FROM teacher WHERE teacher_email = '$t_email' ";
        $check = mysqli_query($conn, $exist);
        if(!(mysqli_num_rows($check)>0)){
        
            $query = "INSERT INTO teacher(teacher_fname,teacher_lname,teacher_gender,teacher_cnic,teacher_email,teacher_phone,teacher_password,teacher_address,teacher_qualification) VALUES('$t_name','$t_lname','$t_gender','$t_cnic','$t_email','$t_phone','$t_password','$t_adress','$t_qua')";
            $query_run = mysqli_query($conn, $query);
       
    if ($query_run) {
        $user = "INSERT INTO users(email,password,type) VALUES('$t_email','$t_password','2')";
        $user_run = mysqli_query($conn, $user);
        echo "1";
    }
    else {
        echo "Something Went Wrong Try Again!!";
    }
}   else {
    echo"Teacher Already Exsist";
        }
    }
    else {
       
        $query = "UPDATE teacher SET  teacher_fname='$t_name',teacher_lname='$t_lname',teacher_gender='$t_gender',teacher_cnic='$t_cnic',teacher_email='$t_email',teacher_phone='$t_phone',teacher_password='$t_password', teacher_address='$t_adress',teacher_qualification='$t_qua' WHERE teacher_id ='$id'";
        $query_run = mysqli_query($conn, $query);
     
        if ($query_run) {
            echo "2";
        }
        }
    
    

?> 