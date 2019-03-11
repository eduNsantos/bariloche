$(document).ready(function() {
	$('td').click(function(e) {
		$(this).parents('tr').find('input[type=radio]').prop('checked', 1);
		$('tr').removeClass('bg-secondary text-white');
		$(this).parents('tr').addClass('bg-secondary text-white');
		var selectText = this;
		var range = document.createRange();
		console.log(range);
		range.selectNode(selectText);
		window.getSelection().addRange(range);
		document.execCommand('Copy');
		window.getSelection().removeAllRanges();
	});
});
$(document).on('submit', '#search', function() {
	let numNota = $('input[name=numNota]').val();
	$('tr').show();
	if (numNota != "") {
		$('.num-nota').each(function() {
			if ($(this).text() != numNota) {
				$(this).parents('tr').hide();
			}
		});
	}
	return false;
});
$(document).on('click', '.clear-search', function() {
	$('tr').show();
});