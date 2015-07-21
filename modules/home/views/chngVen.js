$('#chngVen').on('click', function(){
	var id = $('#idNum').val();
	var manageName = $('#manageName').val();
	var phoneNum = $('#phoneNum').val();
	var email = $('#email').val();
	$.post('/sittingDuckLogin/modules/home/views/chngVen.php',{
		id : id, 
		manageName: manageName,
		phoneNum: phoneNum,
		email: email
	}, function(data){
		document.getElementById("tableHolder").innerHTML = data;
	});
	return false;
});