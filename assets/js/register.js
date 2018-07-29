$(function() {
	$("#register").submit(function(event) {
		
		var errorbox = $("#errorlog");
		var errorlog = $("#errorlog p");
		
		var sname = $('#inputUser').val();
		var password = $('#inputPass').val();
		var cpassword = $('#inputConfirm').val();
		var passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])/; // Regex: must have both numeric and letter characters
		var email = $("#inputEmail").val();
		
		var validateEmail = function() {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		
		var error = function(error) {
			$(document).trigger("add-alerts", [
				{
				  'message': error,
				  'priority': 'error'
				}
			]);
			event.preventDefault();
		};

		if (sname.length < 4 || sname.length > 16) {
			error("The username must be between 4-16 characters.");
		} else if (password.length < 6 || password.length > 12) {
			error("The password has to be between 6-12 characters.");
		} else if (!passwordRegex.test(password)) {
			error("The password must include both numeric and letter characters.");
		} else if (password != cpassword) {
			error("The two passwords do not match.");
		} else if (!validateEmail()) {
			error("Please enter a valid email.");
		}
	});
});

























/* OLD AND UNNECESSARY
window.onclick = function() {
	var target = event.target;
	if (target.nodeName == "INPUT" && target.name != "submit") {
		// Get element
		var next = target.parentElement.nextSibling;
		while (next && next.nodeType != 1)
			next = next.nextSibling;
		
		// Hide other alerts
		var trs = document.getElementsByTagName("tr");
		for (var i=0; i<trs.length; i++) {
			if (trs[i] == next.parentElement && trs[i].parentElement.getAttribute("id") != "registration-form")
				continue;
			trs[i].children[2].children[0].style.display = "none";
		}
		
		// Show alert
		next.children[0].style.display = "block";
	}
}*/