<div class="content container-fluid">
    <div class="page-header">
        <?php if (isset($_REQUEST['from_date']) != "" && isset($_REQUEST['to_date']) != "") {
            $course = $_REQUEST['course'];
            $section = $_REQUEST['section'];
            $form = date($_REQUEST['from_date']);
            $to = date($_REQUEST['to_date']);
            $timeDiffSeconds = strtotime($to) - strtotime($form);
            $timeDiffDays = number_format($timeDiffSeconds / (60 * 60 * 24), 2); // convert seconds to days

        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right mb-2">
                        <a href="includes/export_student_list.php?course=<?= $course ?>&section=<?= $section ?>&from=<?= $form ?>&to=<?= $to ?>"><button class="btn btn-secondary">Export Csv</button></a>
                    </div>
                    <!-- Recent Orders -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
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
                                    <tbody id="table-data">
                                        <?php
                                        //  $sql = "SELECT * FROM student";
                                        $sql = "SELECT student.student_id,student.student_fname,student.student_lname, student.student_class,student.student_section FROM student
                                              INNER JOIN student_attendance ON student_attendance.student_id = student.student_id 
                                              WHERE student.student_class='$course' AND student.student_section ='$section' AND  student_attendance.att_date BETWEEN '$form' AND '$to' GROUP BY student.student_id ";

                                        $qrun = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_array($qrun)) :

                                            $stdid = $data['student_id'];
                                            $present = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and  student_attendance.att_sts='present'"));
                                            $absent = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as student_id  FROM student_attendance WHERE student_id ='$stdid 'and student_attendance.att_sts='Absent'"));

                                            $labels[] = $data["student_fname"];
                                            $countpresent[] =  $present['student_id'];
                                        ?>
                                            <tr>
                                                <td><?= $data['student_fname']; ?> <?= $data['student_lname']; ?></td>
                                                <td><?= @$data['student_class']; ?></td>
                                                <td><?= @$data['student_section']; ?></td>
                                                <td><?= $present['student_id']; ?></td>
                                                <td><?= $absent['student_id']; ?></td>

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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </div>

            </div>

            <!-- /Page Header -->

    </div>
<?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    var label = JSON.parse('<?php echo json_encode($labels); ?>');
    var datapresent = JSON.parse('<?php echo json_encode($countpresent); ?>');
    var days = <?php echo $timeDiffDays ?>;
    console.log(days);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: '# of Present',
                data: datapresent,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: days
                }
            }
        }
    });
</script>