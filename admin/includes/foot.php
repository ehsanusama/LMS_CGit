<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/js/chart.morris.js"></script>
<!-- Select2 JS -->
<script src="assets/js/select2.min.js"></script>

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<script src="includes/script.js"></script>



<script>
	$(document).on('submit', '.fee_form', function() {
		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: "text",
			beforeSend: function() {
				$(".response").html('<div class="alert alert-info">Please Wait...</div>');
			},
			success: function(response, text) {
				var json = JSON.parse($.trim(response));
				$(".response").html('<div class="alert alert-' + json.sts +
					'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
					json.msg + '</div>');
				swal({
						title: "Done!",
						text: json.msg,
						type: json.type,
						showCancelButton: false,
						confirmButtonClass: "btn-success",
						confirmButtonText: 'OK',
						closeOnConfirm: false
					},
					function() {

					});

				console.log(json);
				if (json.sts == "success") {
					setTimeout(function() {
						var print = '<div class="alert alert-success">Fees has been added <a target="_blank" href="index.php?nav=print_fee_voucher&print_id=' + json.print_id + '" class="btn btn-primary">Print Voucher</a></div>';
						form.closest('td').html(print)
					}, 2500)
				}

			},
			error: function(request, status, error) {
				$(".response").html(
					'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
					request.responseText + '</div>');
			}
		});
		return false;
	})
</script>