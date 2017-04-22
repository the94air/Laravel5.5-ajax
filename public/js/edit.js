jQuery(document).ready(function($)  {
	//Ajax Show Edit
	$(".table-container").on("click touchstart", ".edit-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "lists/" + $(this).attr("value") + "/edit",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();
			},
		    success: function (data) {
				$("#update-id").val(data['id']);
				$("#update-title").val(data['title']);
				$("#update-item").val(data['item']);
				$('#update-form').show();
			},
		    error: function(data) {
				$.notify({
					// options
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'An error occurred while getting data.'
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
				$('#update-form').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#update-form');
				})();
	    	}, complete() {
	    		$('#edit-loading-bar').hide();
	    	}
		});
	});
});