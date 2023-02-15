<?php
include_once("../functions/login.php");
include_once("../db/conection.php");
include_once("includes/functions.php");
if (isset($_SESSION['email']) && $_SESSION['login_user'] == 'admin') : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Dashboard</title>
        <?php include_once("includes/head.php");    ?>

    </head>

    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Header -->
            <?php include_once("includes/header.php");  ?>
            <!-- /Header -->

            <!-- Sidebar -->
            <?php include_once("includes/slider.php");  ?>
            <!-- /Sidebar -->

            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <?php
                getMessage(@$msg, @$sts);
                include_once $page; ?>
                <span class="response" style="position: fixed;bottom: 5px;left: 5px"></span>
            </div>
            <!-- /Page Wrapper -->

        </div>
        <!-- /Main Wrapper -->
        <?php include_once("includes/foot.php");  ?>

    </body>

    </html>
<?php
else :
    // echo "Please Login First !!!";
?>
    <script>
        setTimeout(function() {
            window.location.href = "error-404.html"
        });
    </script>
<?php
endif;
?>