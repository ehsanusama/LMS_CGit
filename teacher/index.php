<?php
include_once("../functions/login.php");
include_once("../db/conection.php");
include_once("functions/functions.php");
if (isset($_SESSION['email']) && $_SESSION['login_user'] == 'teacher') { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Teacher Dashboard</title>
		<?php include_once("includes/head.php");    ?>

	</head>

	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<?php include("includes/header.php");  ?>
			<!-- /Header -->

			<!-- Sidebar -->
			<?php include("includes/slider.php");  ?>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
			<div class="page-wrapper">

				<?php
				getMessage(@$msg, @$sts);
				include_once $page; ?>

			</div>
			<!-- /Page Wrapper -->

		</div>
		<!-- /Main Wrapper -->

		<?php include_once("includes/foot.php");  ?>

		<script>
			$(document).on('change', '#checkAll', function() {
				var checkboxes = $(this).closest('form').find(':checkbox');
				if ($(this).is(':checked')) {
					checkboxes.prop('checked', true);
				} else {
					checkboxes.prop('checked', false);
				}
			});
		</script>

		<script>
			$(document).on('click', '.qr-modal-btn', function() {
				var title = $(this).attr('title').split('|');
				console.log(title)
				$("#qr-modal-body").html('<iframe src="scan.php?shift=' + title[0] +
					'&student_id=' + title[1] + '" width="100%" style="min-height: 400px" frameborder="0"></iframe>')
				return false;
			})
			$(function() {
				$('#qr-modal').on('hidden.bs.modal', function() {
					$("#qr-modal-body").html('')
				});
			})
		</script>
	</body>

	</html>
<?php } else {
	// echo "Please Login First !!!";
?>
	<script>
		setTimeout(function() {
			window.location.href = "error-404.html"
		});
	</script>
<?php
}
?>