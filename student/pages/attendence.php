<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Attendence </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendence </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Att#</th>
                                    <th>Student</th>
                                    <th>Status</th>
                                    <th>Dated</th>
                                    <th>Checked IN</th>
                                    <th>Checked OUT</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_SESSION['id'];
                                $q = mysqli_query($conn, "SELECT * FROM student_attendance WHERE student_id='$id'");

                                while ($att = mysqli_fetch_assoc($q)) :
                                    $output = "";
                                    $count = $sum = 0;
                                    $sts = ($att['att_sts'] == 0) ? '<label class="label label-danger">Absent</label>' : '<label class="label label-success">Present</label>';
                                    $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE student_id='$att[student_id]'"));
                                    if (!empty($att['in_time'])) {
                                        $in_time = date('h:i a', strtotime($att['in_time']));
                                    } else {
                                        $in_time = "--";
                                    }
                                    if (!empty($att['out_time'])) {
                                        $out_time = date('h:i a', strtotime($att['out_time']));
                                    } else {
                                        $out_time = "--";
                                    }
                                ?>
                                    <tr>
                                        <td><?= $att['att_id'] ?></td>
                                        <td>
                                            <?= $r['student_fname'] ?> <?= $r['student_lname'] ?>
                                        </td>
                                        <th><?= strtoupper($att['att_sts']) ?></th>
                                        <td><?= date('l, d-M-Y', strtotime($att['att_date'])) ?></td>
                                        <td><?= $in_time ?></td>
                                        <td><?= $out_time ?></td>

                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>
</div>