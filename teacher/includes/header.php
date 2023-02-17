<!-- Header -->
<?php if (!empty($_REQUEST['nav'])) {
    $get_nav = $_REQUEST['nav'];
} else {
    $get_nav = 'home';
}
$page = "pages/" . $get_nav . ".php";
?>
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="index.php" class="logo">
            <img src="assets/img/logo.png" alt="Logo">
            <!-- CGIT -->
        </a>
        <a href="index.php" class="logo logo-small">
            <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>


    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="../uploads/default.png">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Attendence </span> Marked <span class="noti-title"></span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <!-- User Menu -->
        <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM teacher WHERE teacher_id ='$id'";
        $qrun = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($qrun);
        ?>
        <li class="nav-item dropdown has-arrow">
            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="../uploads/<?= $data['teacher_pic'] ?>" width="31" alt="Ryan Taylor"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="../uploads/<?= $data['teacher_pic'] ?>" alt="User Image" class="avatar-img rounded-circle">
                    </div>

                    <div class="user-text">
                        <h6><?= $data['teacher_fname']; ?> <?= $data['teacher_lname']; ?></h6>
                        <p class="text-muted mb-0">Teachher</p>
                    </div>
                </div>
                <a class="dropdown-item" href="index.php?nav=profile">My Profile</a>
                <!-- <a class="dropdown-item" href="settings.php">Settings</a> -->
                <a class="dropdown-item" href="?logout">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->

<?php
//==================================logout function====================================

if (isset($_GET['logout'])) {
    //    // echo "amddddddddd";
    //     exit;
    if (session_destroy()) {
?>
        <script>
            setTimeout(function() {
                window.location.href = "../index.php?login_user=teacher";
            });
        </script>
<?php
    }
}

//==================================logout function====================================
?>