<!DOCTYPE html>
<html ng-app="BasicHttpAuthExample">

  <head>
    <meta charset="utf-8" />
    <meta name=viewport content='width=700'> <!-- recommended for mobile friendly capability -->
    <title>Register New Member</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <style>
    img {
      max-width: 100%
    }
    input, textarea {
  max-width:100%
}
  </style>
<!--   <style>
    h1 {
    display: inline-block;
    margin-top: 0.321em; 

    /* ie 7*/ 
   /* *display: inline;
    *zoom: 1;*/
    *text-align: left; 
}

img.nav {
    display: inline-block;
    /*vertical-align: baseline;*/ 
    
    /* ie 7*/
   /* *display: inline;
    *zoom:1;*/
    *text-align: right;
}
</style> -->
    </head>
 <body style="overflow: hidden"> 
  <h1>Sitting Duck New User Registration </h1>
  <div class = "nav" align = "right">
  <a href="http://www.sittingduckads.com/" target="_newtab">
    <img src="/sittingDuckLogin/sittingDuckLogo.png" class = "nav" alt="Home!" width="75px" height="auto">
  </a> 
  </div>

  <div align="center" id="signup">
  	<fieldset style="width=30%"><legend>Registration Form</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form action ="submitData.php" method="post">
  			<td>First Name</td><td> <input type="text" name="firstName"></td>
  		</tr>
  		<tr>
  			<td>Last Name</td><td> <input type="text" name="lastName"></td>
  		</tr>
  		<tr>
  			<td>Username</td><td> <input type="text" name="username"></td>
  		</tr>
  		<tr>
  			<td>Password</td><td> <input type="password" name="password"></td>
  		</tr>
      <tr>
        <select name="accountType">
          <option value="reg">Sitting Duck Standard</option>
          <option value="plus">Sitting Duck Pro</option>
          <option value="admin">Sitting Duck Administrator</option>
        </select>

      </tr>
  		<tr>
  		<td><input id="button" type="submit" name = "submit" value="Sign-Up"></td>
  	</tr>
  </form>
  <table>
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
  <!-- <script>
                  var btn = document.getElementById('back');
                  btn.addEventListener('click', function() {
                    document.location.href = '/sittingDuckLogin/modules/home/views/home.php';
                  });
                </script> -->
   <p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
</div>
  </body>

</html>