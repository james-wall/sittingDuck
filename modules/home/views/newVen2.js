$('#newVen').on('click', function(){
  var venName = $("#venName").val();
  var venAddress = $("#venAddress").val();
  var manageName = $('#newManageName').val();
  var phoneNum = $('#newPhoneNum').val();
  var email = $('#newEmail').val(); 
  var numBathMen = $("#numBathMen").val();
  var numUnitsMen = $("#numUnitsMen").val();
  var numBathWomen = $("#numBathWomen").val();
  var numUnitsWomen = $("#numUnitsWomen").val();
  var numBathUni = $("#numBathUni").val();
  var numUnitsUni = $("#numUnitsUni").val();


  $.post('/sittingDuckLogin/modules/home/views/newVen.php',{
    venName: venName,
    venAddress: venAddress,
    manageName: manageName,
    phoneNum: phoneNum,
    email: email,
    numBathMen : numBathMen,
    numUnitsMen : numUnitsMen,
    numBathWomen : numBathWomen,
    numUnitsWomen : numUnitsWomen,
    numBathUni : numBathUni,
    numUnitsUni : numUnitsUni
  }, function(data){
    document.getElementById("tableHolder").innerHTML = data;
  });
  return false;
});