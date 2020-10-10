$('form').on('submit', function (e) {
	if (!$(this).hasClass("enabled")) {
		$(this).find('button.btn').prop('disabled', true);
	}
});