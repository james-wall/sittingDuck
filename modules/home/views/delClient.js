$('#delCli').on('click', function(){
	var id = $('#delClientID').val();
	$.post('/sittingDuckLogin/modules/home/views/delClient.php',{
		id: id
	}, function(data){
		document.getElementById("tableHolder2").innerHTML = data;
	});
	return false;
});