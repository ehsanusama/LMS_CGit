<?php include_once("functions.php");
date_default_timezone_set("Indian/Maldives");
?>

<?php
$servername   = "localhost";
$database = "lms_cgit";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
//   echo "Connected successfully";
