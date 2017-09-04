jQuery(document).ready(function($)  {
	$('#show-item').on('hidden.bs.modal', function () {
		$('#title-display').text('');
		$('#item-display').text('');
		$('#item-not-found').remove();
		$('#show-loading-bar').show();
	});

	$(".table-container").on("click touchstart", ".show-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "lists/" + $(this).attr("value"),
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();
			$('#title-display').text('');
			$('#item-display').text('');
			$('#view-data').hide();
			},
		    success: function (data) {
		    	(function(){
					var title = data['title'];
					$('#title-display').text(title);
				})();
		    	(function(){
					var item = data['item'];
					$('#item-display').text(item);
				})();
				$('#view-data').show();
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
				$('#view-data').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#view-data');
				})();
	    	}, complete() {
	    		$('#show-loading-bar').hide();
	    	}
		});
	});
});