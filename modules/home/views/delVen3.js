$('#delVen').on('click', function(){
    var delID = $("#venID").val();
    $.post('/sittingDuckLogin/modules/home/views/delVen.php',{
        venID: delID
    }, function(data){
    	document.getElementById("tableHolder").innerHTML = data;
    });
    return false;
});