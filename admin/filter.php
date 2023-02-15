<?php
$batch = $_REQUEST["batch"];
$course = $_REQUEST["course"];
include("../db/conection.php");
$sql = "SELECT student_id, student_fname ,student_lname,student_phone ,student_email , student_section,student_class FROM student
  WHERE student_section LIKE '%{$batch}%' AND student_class LIKE '%{$course}%'";
include("../db/conection.php");
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";

if (mysqli_num_rows($result) > 0) {

   while ($row = mysqli_fetch_assoc($result)) {
      $output .= "  
             <tr>
               <td>{$row['student_id']}</td>
                <td> {$row['student_fname']}     {$row['student_lname']}  </td>   
                <td> {$row['student_class']}  </td>
                <td> {$row['student_section']}   </td>
                <td> {$row['student_phone']}   </td>
                <td> <a href='mailto:{$row['student_email']}'>{$row['student_email']}</a>   </td>
                
                <td class='text-right'>
					<div class='actions'>
					<a class='btn btn-sm bg-success-light'  href='?nav=student_create&edit={$row['student_id']}'>
							<i class='fe fe-edit'></i> Edit
						</a>
						<a class='btn btn-sm bg-danger-light' href='?nav=student_display&student_delete={$row['student_id']}'>
							<i class='fe fe-trash' ></i> Delete
						</a>
						
					</div>
				</td>
            </tr>
      
               ";
   }

   echo  $output;
} else {
   echo "No Data Found";
}
