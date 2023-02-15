<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Student Fee </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Student Fee</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Enter Student ID#: </label>
                                            <input type="text" placeholder="Student ID(s) separated by (,) comma(s)" name="student_ids" class="form-control">
                                        </div><!-- form-group -->
                                    </div><!-- col -->
                                </div><!-- row -->
                                <div class="form-group">
                                    <button name="student_id_btn" class="btn btn-primary">Generate by ID <span class="glyphicon glyphicon-ok"></span></button>
                                </div>
                            </form>
                            <form action="" method="post">
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
                                                <?php $q = mysqli_query($conn, "SELECT * FROM classes WHERE class_status= 'Active'");
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
                                                <?php $q = mysqli_query($conn, "SELECT * FROM section WHERE section_status= 'Active'");
                                                while ($r = mysqli_fetch_assoc($q)) :
                                                ?>
                                                    <option value="<?= $r['section_name'] ?>"><?= strtoupper($r['section_name']) ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div><!-- form-group -->
                                    </div><!-- col -->
                                </div><!-- row -->
                                <div class="form-group">
                                    <button name="student_list" class="btn btn-primary">Generate <span class="glyphicon glyphicon-ok"></span></button>
                                </div>
                            </form>
                        </div><!-- col -->
                    </div><!-- row -->


                </div>

                <div class="card-body">
                    <?php if (isset($_REQUEST['student_list']) or isset($_REQUEST['student_id_btn'])) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table myTable">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            @$course = strtolower($_REQUEST['course']);
                                            @$batch = strtolower($_REQUEST['batch']);
                                            if (!empty($_REQUEST['student_ids'])) {
                                                // $student_id=explode(',',$_REQUEST['student_list']);
                                                $student_ids = $_REQUEST['student_ids'];
                                                $q = mysqli_query($conn, "SELECT * FROM student WHERE student_id IN ($student_ids)");
                                            } else {
                                                $q = mysqli_query($conn, "SELECT * FROM student WHERE LOWER(student_class)='$course'");
                                            }

                                            while ($r = mysqli_fetch_assoc($q)) :
                                                $pic = (empty($r['student_pic'])) ? "default.png" : $r['student_pic'];
                                            ?>
                                                <tr>

                                                    <td><img src="../uploads/<?= $pic ?>" style="width: 80px;height: 80px" class="img img-responsive" alt="">
                                                        <strong>Student ID#: </strong><?= $r['student_id'] ?><br>
                                                        <strong>First Name: </strong><?= $r['student_fname'] ?><br>
                                                        <strong>Last Name: </strong><?= $r['student_lname'] ?><br>
                                                        <strong>Course: </strong><?= $r['student_class'] ?><br>
                                                        <strong>Batch: </strong><?= strtoupper($r['student_section']) ?><br>
                                                    </td>
                                                    <td>
                                                        <form action="api/index.php" method="post" class="fee_form">
                                                            <input type="hidden" value="<?= $r['student_id'] ?>" name="student_id">
                                                            <input type="hidden" value="<?= $_SESSION['id'] ?>" name="user_id">
                                                            <input type="hidden" value="add_fee" name="action">
                                                            <input type="hidden" name="batch" value="<?= @$batch ?>">
                                                            <input type="hidden" name="course" value="<?= @$course ?>">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="">Dated</label>
                                                                        <input type="date" class="form-control dateField" placeholder="Dated" name="dated" autocomplete="off" required>
                                                                    </div><!-- group -->
                                                                </div><!-- col -->
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="">Amount</label>
                                                                        <input type="number" class="form-control" placeholder="Amount" name="amount" autocomplete="off" min="0" required>
                                                                    </div><!-- group -->
                                                                </div><!-- col -->
                                                            </div><!-- row -->
                                                            <div class="form-group">
                                                                <label for="">Installment Count</label>
                                                                <select required name="installment" class="form-control" id="">
                                                                    <option value="">Choose</option>
                                                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div><!-- group -->
                                                            <div class="form-group">
                                                                <textarea name="notes" class="form-control" id="" cols="30" rows="4" placeholder="Notes if any"></textarea>
                                                            </div><!-- form group -->
                                                            <div class="text-right">
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col -->
                        </div><!-- row -->
                    <?php endif; ?>
                </div>
            </div>


        </div>
    </div>
</div>