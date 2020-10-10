$(document).ready(function() {
	$('.cuit').mask('00-00000000-0');
	$('.cuit').prop('minLength', 13);
});