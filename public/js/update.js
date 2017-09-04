jQuery(document).ready(function($)  {
	$('#edit-item').on('hidden.bs.modal', function () {
		$("#update-id").val('');
		$("#update-title").val('');
		$("#update-item").val('');
		$('.error-list').remove();
		$('#item-not-found').remove();
		$('#update-form').hide();
		$('#edit-loading-bar').show();
	});

	//Ajax update
	$("#update-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "lists/" + $('#update-id').attr("value"),
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data : $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list').remove();
		    	$("#update-submit").prop("disabled", true);
		    	$("#update-submit").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Loading...</span>');
		    }, statusCode: {
				500: function() {
					$.notify({
					// options
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error 500</strong>: <br>',
					message: 'An error occurred while sending data.'
					},{
					// settings
					type: "danger",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
				}
	    	}, success: function (data) {
		    	$success = data.responseJSON;
					$.notify({
					// options
					icon: 'fa fa-check',
					title: '<strong>Success</strong>: <br>',
					message: data['msg']
					},{
					// settings
					type: "success",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
					$( "#update-id" ).val('');
					$( "#update-title" ).val('');
					$( "#update-item" ).val('');
					$('#edit-item').modal('toggle');
					// refresh data
					refreshTable();
		    }, error :function(data) {
		        $errors = data.responseJSON.errors;
				var id = '';
				for (var i in $errors) {
				id += "update-" + i;
				(function(){
				var error = $("<label for='" + id + "' class='error-list'>" + $errors[i] + "</label>");
				error.hide().fadeIn("slow");
				error.insertAfter('#' + id);
				})();
				id = '';
				}
	    	}, complete() {
				$( ".loading" ).remove();
				$( ".loading-fallback" ).remove();
				$("#update-submit").text('Update Item');
				$("#update-submit").prop("disabled", false);
	    	}
		});
	});
});