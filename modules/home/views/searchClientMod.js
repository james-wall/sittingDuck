var searchClient = $('#searchClient').val();
$.post('/sittingDuckLogin/modules/home/views/searchClientMod.php',{
	searchClient : searchClient
}, function(data){
	document.getElementById("tableHolder4").innerHTML = data;
});