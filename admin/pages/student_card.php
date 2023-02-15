<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Student Card </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Student Card</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="container-fluid>

        <div class=" row">
        <div class="col-md-12">
            <!-- Recent Orders -->
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Student ID#</label>
                            <select name="student_id" required class="form-control" id="">
                                <option value="">Choose Student</option>

                                <?php
                                $q = mysqli_query($conn, "SELECT * FROM student");
                                while ($r = mysqli_fetch_assoc($q)) :
                                ?>
                                    <option value="<?= $r['student_id'] ?>"><?= strtoupper($r['student_fname']) ?> <?= strtoupper($r['student_lname']) ?> Class: <?= strtoupper($r['student_class']) ?> ==> Section: <?= strtoupper($r['student_section']) ?> </option>
                                <?php endwhile; ?>
                            </select>
                            <?php if (mysqli_num_rows($q) == 0) : ?>
                                <p class="text-danger">Please add student first. <a href="index.php?nav=student">Click here</a></p>
                            <?php endif; ?>
                        </div><!-- form group -->
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit" name="card_btn">Show Card</button>
                        </div><!-- group -->
                    </form>
                </div class="card-body">
                <?php if (isset($_REQUEST['card_btn'])) :
                    $student_id = $_REQUEST['student_id'];
                    $fetchUserStudent = fetchRecord($conn, "student", "student_id", $student_id);
                ?>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4  ">
                            <div class="card flex-fill">
                                <div class="card-header ">
                                    <h5 class="card-title mb-0">
                                        <table>
                                            <tr>
                                                <td><img src="assets/img/logo.png" style="border-radius: 100%;width: 64px;height: 64px" alt=""></td>
                                                <td>
                                                    &nbsp; Convert Generation <br> &nbsp; Information Technology - CGit
                                                </td>
                                            </tr>
                                        </table>

                                        </sph5an>
                                </div>

                                <table class="table " style="border: 0;">
                                    <tr>
                                        <td>
                                            <img src="../uploads/<?= $fetchUserStudent['student_pic'] ?>" style="width: 100px;height: 100px" class="img img-responsive" alt="">
                                        </td>
                                        <td class="text-center">
                                            <span><?php echo getQR(base64_encode($fetchUserStudent['student_id']), 100, 5); ?></span>
                                            <br>
                                            <span><strong>Student ID#:</strong> <?= $fetchUserStudent['student_id'] ?></span>
                                        </td>
                                    </tr>
                                </table>

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item"><strong>Name: </strong> <?= strtoupper($fetchUserStudent['student_fname']) ?> </strong> <?= strtoupper($fetchUserStudent['student_lname']) ?></li>
                                    <li class="list-group-item"> <strong>Class: </strong> <?= strtoupper($fetchUserStudent['student_class']) ?> &nbsp; &nbsp; &nbsp; &nbsp; <strong>Section: </strong> <?= strtoupper($fetchUserStudent['student_section']) ?></li>
                                    <li class="list-group-item"><strong>Phone: </strong> <?= strtoupper($fetchUserStudent['student_phone']) ?></li>
                                    <li class="list-group-item"><strong>Join Date: </strong> <?= date(' d-M-Y', strtotime($fetchUserStudent['student_add_date'])) ?></li>
                                </ul>
                            </div>
                        </div>

                    <?php endif; ?>
                    </div>
                    <div>

                    </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>

    <!-- /Page Header -->

</div>

</div>