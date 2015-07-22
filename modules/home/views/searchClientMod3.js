$(document).ready(function(){
	alert("I'm here2!");
	$.post('/sittingDuckLogin/modules/home/views/searchClientMod.php',{
	}, function(data){
		document.getElementById("tableHolder4").innerHTML = data;
		alert("success!");
	});
});