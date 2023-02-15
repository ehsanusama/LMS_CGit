<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Student Fee Voucher</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Student Fee Voucher</li>
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
                    <form action="" method="post">
                        <h4 class="card-title">Generate Voucher</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Choose Class</label>
                                    <select name="course" id="" class="form-control" required>
                                        <?php if (empty($fetchStudyGroup['class_id'])) : ?>
                                            <option value="">Choose Class</option>
                                        <?php else : ?>
                                            <option value="<?= $fetchStudyGroup['class_id'] ?>"><?= $fetchStudyGroup['class_id'] ?></option>
                                        <?php endif; ?>
                                        <?php $q = mysqli_query($conn, "SELECT * FROM classes WHERE class_status='Active'");
                                        while ($r = mysqli_fetch_assoc($q)) :
                                        ?>
                                            <option value="<?= $r['class_name'] ?>"><?= strtoupper($r['class_name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Choose Batch</label>
                                    <select name="batch" id="" class="form-control" required>
                                        <option value="">Choose Batch</option>
                                        <?php $q = mysqli_query($conn, "SELECT * FROM section WHERE section_status='Active'");
                                        while ($r = mysqli_fetch_assoc($q)) :
                                        ?>
                                            <option value="<?= $r['section_name'] ?>"><?= strtoupper($r['section_name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                        </div><!-- row -->
                        <div class="text-right">
                            <button name="voucher_list" class="btn btn-primary">Generate Voucher <span class="glyphicon glyphicon-ok"></span></button>
                        </div>
                    </form>
                    <form action="" method="post">
                        <h4 class="card-title">Show Fee Details</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Choose Class</label>
                                    <select name="course" id="" class="form-control" required>
                                        <?php if (empty($fetchStudyGroup['class_id'])) : ?>
                                            <option value="">Choose Class</option>
                                        <?php else : ?>
                                            <option value="<?= $fetchStudyGroup['class_id'] ?>"><?= $fetchStudyGroup['class_id'] ?></option>
                                        <?php endif; ?>
                                        <?php $q = mysqli_query($conn, "SELECT * FROM classes WHERE class_status='Active'");
                                        while ($r = mysqli_fetch_assoc($q)) :
                                        ?>
                                            <option value="<?= $r['class_name'] ?>"><?= strtoupper($r['class_name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Choose Batch</label>
                                    <select name="batch" id="" class="form-control" required>
                                        <option value="">Choose Batch</option>
                                        <?php $q = mysqli_query($conn, "SELECT * FROM section WHERE section_status='Active'");
                                        while ($r = mysqli_fetch_assoc($q)) :
                                        ?>
                                            <option value="<?= $r['section_name'] ?>"><?= strtoupper($r['section_name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                        </div><!-- row -->
                        <div class="text-right">
                            <button name="voucher_list_table" class="btn btn-primary">Show Fee Details <span class="glyphicon glyphicon-ok"></span></button>
                        </div>
                    </form>
                    <hr>
                    <?php
                    if (isset($_REQUEST['voucher_list_table'])) {
                        $course = strtolower($_REQUEST['course']);
                        $batch = strtolower($_REQUEST['batch']);
                        $q = mysqli_query($conn, "SELECT * FROM fee WHERE LOWER(course)='$course' AND LOWER(batch)='$batch'");
                    ?>
                        <table class="myTable table">
                            <tr>
                                <th>Voucher #</th>
                                <th>Student</th>
                                <th>Course & Batch</th>
                                <th>Installment</th>
                                <th>Amount</th>
                                <th class="text-right">Action</th>
                            </tr>
                            <?php
                            while ($r = mysqli_fetch_assoc($q)) :
                                $fetchStudent = fetchRecord($conn, "student", 'student_id', $r['student_id']);
                            ?>
                                <tr>
                                    <th><?= $r['id'] ?></th>
                                    <td><?= strtoupper($fetchStudent['student_fname']) ?> <?= strtoupper($fetchStudent['student_lname']) ?></td>
                                    <td>
                                        <strong>Course: </strong> <?= strtoupper($r['course']) ?> <br>
                                        <strong>Batch: </strong> <?= strtoupper($r['batch']) ?> <br>
                                    </td>
                                    <td>
                                        <?= ($r['installment']) ?>
                                    </td>
                                    <td>
                                        <?= ($r['amount']) ?>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn bg-primary-light" target="_blank" href="index.php?nav=print_fee_voucher&print_id=<?= $r['id'] ?>">Print</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>

                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_REQUEST['voucher_list'])) :
                        $course = strtolower($_REQUEST['course']);
                        $batch = strtolower($_REQUEST['batch']);
                        $q = mysqli_query($conn, "SELECT * FROM fee WHERE LOWER(course)='$course' AND LOWER(batch)='$batch'");

                    ?>
                        <table class="myTable table">
                            <tr>
                                <th>Voucher #</th>
                                <th>Student</th>
                                <th>Course & Batch</th>
                                <th class="text-right">Action</th>
                            </tr>
                            <?php
                            while ($r = mysqli_fetch_assoc($q)) :
                                $fetchStudent = fetchRecord($conn, "student", 'student_id', $r['student_id']);
                            ?>
                                <tr>
                                    <th><?= $r['id'] ?></th>
                                    <td><?= strtoupper($fetchStudent['student_fname']) ?> <?= strtoupper($fetchStudent['student_lname']) ?></td>
                                    <td>
                                        <strong>Course: </strong> <?= strtoupper($r['course']) ?> <br>
                                        <strong>Batch: </strong> <?= strtoupper($r['batch']) ?> <br>
                                    </td>
                                    <td class="text-right">
                                        <a target="_blank" href="index.php?nav=print_fee_voucher&print_id=<?= $r['id'] ?>" target="_blank" class="btn bg-primary-light"><i class="fe fe-print"></i> Print</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>
</div>