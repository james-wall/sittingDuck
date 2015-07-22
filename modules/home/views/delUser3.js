$('#delUser').on('click', function(){
	var id = $('#delUserIDNum').val();
	$.post('/sittingDuckLogin/modules/home/views/delUser.php',{
		id: id
	}, function(data){
		if(data === "success!"){
			alert("Successfully removed the specified user!");
		}
	});
	return false;
});