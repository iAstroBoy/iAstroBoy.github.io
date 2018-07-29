$(function () {
    var form_data = '';
	var input = $('#s');
	var datalist = $('#ranking-search');
	var datatype = input.attr('placeholder') == 'Guild Name' ? 'guilds' : 'characters';
	
	input.keyup(function () {
		if (input.val().length < 2) return false;
		form_data = {
			name: input.val(),
			type: datatype,
			is_ajax: '1'
		};
		$.ajax({
			type: 'POST',
			url: '?base=misc&script=ranking-searcher',
			data: form_data,
			success: function (response) {
				var obj = $.parseJSON(response);
				datalist.empty();
				$.each(obj, function( index, value ) {
					datalist.append("<option value='" + value.name + "'></option>");
				});
			}
		});
		return false;
	});
});