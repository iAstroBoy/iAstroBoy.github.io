$(function () {
    var action = '';
    var form_data = '';

	action = $("#status");
	action2 = $("#status2")
	action3 = $("#status3")
	form_data = {
		is_ajax: '1'
	};
	$.ajax({
		type: 'POST',
		url: '?base=misc&script=port-check',
		data: form_data,
		success: function (response) {
			if (response != 'open') {
				action.fadeIn();
				action2.css({"background-color": "#d9534f"});
				action2.html("0 Players Online");
				action3.html("0 Players Online");
			}
			//console.log(response);
		}
	});
	return false;
});