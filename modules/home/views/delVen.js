$('#delVen').on('click', function(){
	alert("in here");
    var delID = $("#venID").val();
    $.post('/sittingDuckLogin/modules/home/views/delVen.php',{
        venID: delID
    }, function(data){
    	alert("in here2");
    	document.getElementById("tableHolder").innerHTML = data;
    	alert("in here3");
    });
    return false;
});