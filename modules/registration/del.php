<!DOCTYPE html>
<html ng-app="BasicHttpAuthExample">

  <head>
    <meta charset="utf-8" />
    <meta name=viewport content='width=700'> <!-- recommended for mobile friendly capability -->
    <title>Remove Member</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <style>
    img {
      max-width: 100%
    }
    input, textarea {
  max-width:100%
}
  </style>
  </head>

 <body style="overflow: hidden"> 
  <h1>Member Removal</h1>

  <div align="center" id="signup">
  	<fieldset style="width=30%"><legend>Registration Form</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  		<form action ="delData.php" method="post">
  			<td>First Name</td><td> <input type="text" name="firstName"></td>
  		</tr>
  		<tr>
  			<td>Last Name</td><td> <input type="text" name="lastName"></td>
  		</tr>
      <tr>
        <td>ID Number</td><td> <input type="text" name="idNum"></td>
      </tr>
  		<tr>
  		<td><input id="delbutton" type="submit" name = "delete" value="Remove"></td>
  	</tr>
  </form>
  </table>
  </fieldset>

</div>



<div align="left">
  	<!-- <p><a href="/sittingDuckLogin/modules/home/views/home.php">Back</a></a></p> -->
   <FORM><INPUT Type="button" id="back" value="Back"></FORM>
   <script>
   	document.getElementById("back").onclick = function () {
      window.alert('Please click OK and then log in again for security purposes'); 
      window.location.href = "/sittingDuckLogin/index.html";
    };
   </script>
   <p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
</div>
  </body>

</html>