$('#chngClient').on('click', function(){
	alert("here3!");
	var id = $('#cliIDNum').val();
	var manageName = $('#cliContactName').val();
	var phoneNum = $('#cliPhoneNum').val();
	alert(id);
	alert(manageName);
	alert(phoneNum);
	$.post('/sittingDuckLogin/modules/home/views/chngClient.php',{
		id : id, 
		manageName: manageName,
		phoneNum: phoneNum
	}, function(data){
		document.getElementById("tableHolder2").innerHTML = data;
	});
	return false;
});