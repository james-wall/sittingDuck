$(document).ready(function(){
	$.post('/sittingDuckLogin/modules/home/views/searchVenueMod.php',{
	}, function(data){
		document.getElementById("tableHolder5").innerHTML = data;
	});
});