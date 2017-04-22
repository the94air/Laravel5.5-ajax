jQuery(document).ready(function($)  {
	//Ajax store
	$("#store-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "lists",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data:  $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list').remove();
		    	$("#store-submit").prop("disabled", true);
		    	$("#store-submit").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Loading...</span>');
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
		    		data.responseJSON;
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
					$( "#store-title" ).val('');
					$( "#store-item" ).val('');
					$('#create-item').modal('toggle');
					// refresh data
					refreshTable();
		    }, error :function(data) {
		        $errors = data.responseJSON;
				var id = '';
				for (var i in $errors) {
				id += "store-" + i;
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
				$("#store-submit").text('Create Item');
				$("#store-submit").prop("disabled", false);
	    	}
		});
	});
});