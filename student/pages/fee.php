<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Assignment </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Assignment </li>
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
                        <?php

                        $q = mysqli_query($conn, "SELECT * FROM fee WHERE student_id='$_SESSION[id]'");
                        ?>
                        <div>
                            <button class="btn btn-primary hidden-print btn-block" onclick="window.print()">Print</button><br> <br>
                        </div>

                        <table class="myTable table table-bordered" style="margin-top: 20px">
                            <thead>
                                <tr>
                                    <th>Voucher #</th>
                                    <th>Student</th>
                                    <th>Course & Batch</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_assoc($q)) :
                                    $fetchStudent = fetchRecord($conn, "student", 'student_id', $r['student_id']);
                                ?>
                                    <tr>
                                        <th>Voucher #: <?= $r['id'] ?> </th>
                                        <td>
                                            Student#: <?= ($fetchStudent['student_id']) ?> <br><?= strtoupper($fetchStudent['student_fname']) ?> <?= strtoupper($fetchStudent['student_lname']) ?></td>
                                        <td>
                                            <strong>Course: </strong> <?= strtoupper($r['course']) ?> <br>
                                            <strong>Batch: </strong> <?= strtoupper($r['batch']) ?> <br>
                                        </td>
                                        <td>
                                            <strong>Due Date: </strong> <?= date('d-M-Y', strtotime($r['dated'])) ?><br>
                                            <strong>Instalment:</strong> <?= ($r['installment']) ?><br>
                                            <strong>Payable Amount: </strong> <?= ($r['amount']) ?><br>
                                            <strong>Fine Amount: </strong> <?= ($r['fine']) ?><br>
                                            <strong>After Due Date: </strong> <?= (float)($r['fine']) + (float)($r['amount']) ?><br>
                                        </td>
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