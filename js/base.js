$(document).ready(function() {
	//loadings  teamplates
$( document ).ajaxStart(function() {
	$('#floatingCirclesG').css({
		'display': 'block'
	});

});
$( ".registration-link" ).click(function() {
  $( ".content" ).load("teamplates/login.html" );
});
$(document).ajaxSuccess(function() {
	$('#floatingCirclesG').css({
		'display': 'none'
	});
});
});