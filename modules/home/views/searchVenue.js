$('#searchUnitVenue').on('click', function(){
	var searchClient = $('#searchVenue').val();
	$.post('/sittingDuckLogin/modules/home/views/searchVenue.php',{
		searchVenue : searchVenue
	}, function(data){
		document.getElementById("tableHolder3").innerHTML = data;
	});
	return false;
});