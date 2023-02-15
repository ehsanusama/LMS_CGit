<?php


session_start();
function login(){
    if(isset($_POST['submit'])){
        include("db/conection.php");
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $password= mysqli_real_escape_string($conn,$_POST['password']);
        $login_user=$_REQUEST['login_user'];
        $login_user_email=$login_user."_email";
		$login_user_password=$login_user."_password";
        $login_user=$_REQUEST['login_user'];

       
        if($email!="" && $password!="" && $login_user !="")
        { //if  not empty check
            $q=mysqli_query($conn,"SELECT * FROM $login_user WHERE $login_user_email='$email' AND $login_user_password='$password'");
            $r=mysqli_fetch_assoc($q);
            $count = mysqli_num_rows($q);
			 if ($count==1) {
			 	# code...
			 	$_SESSION['email']=$email;
                $_SESSION['id']= $r [$login_user."_id"];

			 	$_SESSION['login_user']=$_REQUEST['login_user'];
			 	header('refresh:1;url='.$login_user."/");
			 	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success!</strong> Login Successfull.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>';
			 }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Enter Correct  Email Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
			 }
            
            } 
        else
        {
            ?>
            <div class="card-panel">
                <p class="text-warning"><strong class="white-text">Attention!</strong>Don't leave any Field Empty</p>
            </div>
            <script>
                setTimeout(function(){ window.location.href="index.php"; }, 1000);
            </script>
            <?php
        }

}

}




