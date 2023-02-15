<div class="content container-fluid">
	<div class="page-header">
                <?php if(isset($_REQUEST['from_date'])!="" && isset($_REQUEST['to_date'])!=""){ 
                    $course = $_REQUEST['course'];
                    $section = $_REQUEST['section'];
                    $form = $_REQUEST['from_date'];
                    $to = $_REQUEST['to_date'];
                    ?>
                    <div class="row">
						<div class="col-md-12">
						<div class="text-right mb-2">
								<a href="includes/export_student_list.php?course=<?=$course?>&section=<?=$section?>&from=<?=$form ?>&to=<?=$to?>"><button class="btn btn-secondary">Export Csv</button></a>	
							</div>
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0" >
											<thead>
												<tr>
    
													<th>Name</th>
													<th>Course</th>
													<th>Batch</th>
                                                    <th>Present</th>
													<th>Absent</th>
													<!-- <th>attendence %</th> -->
					
												</tr>
											</thead>
									<tbody  id="table-data">
                                <?php 
                                      //  $sql = "SELECT * FROM student";
                                      $sql = "SELECT student.student_id,student.student_fname,student.student_lname, student.student_class,student.student_section FROM student
                                              INNER JOIN student_attendance ON student_attendance.student_id = student.student_id 
                                              WHERE student.student_class='$course' AND student.student_section ='$section' AND  student_attendance.att_date BETWEEN '$form' AND '$to' GROUP BY student.student_id ";
                                    
                                       $qrun = mysqli_query($conn, $sql);												
                                    while ($data = mysqli_fetch_array($qrun)):	
                                        $stdid = $data['student_id'];
                                        $present=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and  student_attendance.att_sts='present'"));
                                        $absent=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and student_attendance.att_sts='Absent'"));
                                    ?>
                                <tr>
                                    <td><?=$data['student_fname']; ?>	<?=$data['student_lname']; ?></td>
                                    <td><?=@$data['student_class'] ;?></td>
                                    <td><?=@$data['student_section'] ;?></td>
                                    <td><?=$present['student_id'] ;?></td>
                                    <td><?=$absent['student_id'] ;?></td>
    
                                </tr>
                                     <?php endwhile;  ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
                
                <!-- /Page Header -->
                			
    </div>
                <?php } ?>
</div>