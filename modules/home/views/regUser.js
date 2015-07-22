$('#regUser').on('click', function(){
	var firstName = $('#firstName').val();
	var lastName = $('#lastName').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var accountType = $('#accountType').val();
	var affiliation = $('#affiliation').val();
	$.post('/sittingDuckLogin/modules/home/views/regUser.php',{
		firstName : firstName, 
		lastName: lastName,
		username: username,
		password: password,
		accountType: accountType,
		affiliation: affiliation
	}, function(data){
		if(data === "success!"){
			alert("Successfully registered new user!");

		}
	});
	return false;
});