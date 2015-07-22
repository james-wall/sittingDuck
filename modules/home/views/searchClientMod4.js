$(document).ready(function(){
	$.post('/sittingDuckLogin/modules/home/views/searchClientMod.php',{
	}, function(data){
		document.getElementById("tableHolder4").innerHTML = data;
	});
});