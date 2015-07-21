$('#chngClient').on('click', function(){
	var id = $('#cliIDNum').val();
	var manageName = $('#cliContactName').val();
	var phoneNum = $('#cliPhoneNum').val();
	$.post('/sittingDuckLogin/modules/home/views/chngClient.php',{
		idNum : id, 
		contactName: manageName,
		phoneNum: phoneNum
	}, function(data){
		document.getElementById("tableHolder2").innerHTML = data;
	});
	return false;
});