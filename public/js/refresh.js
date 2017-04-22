function refreshTable() {
	$('div.table-container').hide();
	$('#table-loader').hide();
	$('#table-loader').fadeIn();
	$('div.table-container').load('table', function() {
		$('#table-loader').hide();
		$('div.table-container').fadeIn();
	});
}

jQuery(document).ready(function($)  {
	$('#update-form').hide();
	$('#view-data').hide();
	$('#table-loader').hide();
	$('#destroy-loading-bar').hide();
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// refresh button
	$("#refresh").bind("click touchstart", function () {
		refreshTable();
	});
});