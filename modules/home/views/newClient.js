$('#newClient').on('click', function(){
	var clientName = $('#newClientName').val();
	var contactName = $('#newContactName').val();
	var phoneNum = $('#newCliPhoneNum').val();
	$.post('/sittingDuckLogin/modules/home/views/newClient.php',{
		clientName : clientName, 
		contactName: contactName,
		phoneNum: phoneNum
	}, function(data){
		document.getElementById("tableHolder2").innerHTML = data;
	});
	return false;
});