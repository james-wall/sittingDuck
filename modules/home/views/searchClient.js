$('#searchUnitClient').on('click', function(){
	var searchClient = $('#searchClient').val();
	$.post('/sittingDuckLogin/modules/home/views/searchClient.php',{
		searchClient : searchClient
	}, function(data){
		document.getElementById("tableHolder3").innerHTML = data;
	});
	return false;
});