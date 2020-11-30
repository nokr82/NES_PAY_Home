$(function(){
	$(".date").datepicker({
		format: 'yyyy-mm-dd',
		autoHide: true
	});
	$('.depth1').on('mouseover', function () {
		$('.depth2, .bg_depth2').show();
	});
	$('.bg_depth2').on('mouseleave', function () {
		$('.depth2, .bg_depth2').hide();
	});
});
