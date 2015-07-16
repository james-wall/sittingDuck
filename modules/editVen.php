<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
	<meta name=viewport content='width=700'> <!-- recommended for mobile friendly capability -->
	<style>
	  img {
	    max-width: 100%
	  }
	  input, textarea {
  max-width:100%
}
	</style>
</head>
<body>
	<?php
		$user = 'root';
		$password = '';
		$con = 'sittingduckclients';
		$connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
		// Check connection
		
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
		$query = mysqli_query($connection,"SELECT * FROM venues");
		echo"\r\n <div align = center><h1>Current Sitting Duck Venue Information</h1></div>";
		echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
				<tr>
				<th>Venue ID</th>
				<th>Venue Name</th>
				<th>Manager Name</th>
				<th>Contact Phone Number</th>
				<th>Contact Email</th>
				<th> Number of Mens Bathrooms</th>
				<th> Number of Mens Units</th>
				<th> Number of Womens Bathrooms</th>
				<th> Number of Womens Units</th>
				<th> Number of Unisex Bathrooms</th>
				<th> Number of Unisex Units</th>
				</tr>";
		while($newRow=mysqli_fetch_array($query, MYSQLI_ASSOC))
				{
					// echo"Here!!";
					// echo $newRow['venName'];
					// echo $newRow['contactPhoneNum'];
					echo "<tr>";
					echo "<td>" . $newRow['id'] . "</td>";
					echo "<td>" . $newRow['venName'] . "</td>";
					echo "<td>" . $newRow['managerName'] . "</td>";
					echo "<td>" . $newRow['contactPhoneNum'] . "</td>";
					echo "<td>" . $newRow['contactEmail'] . "</td>";
					echo "<td>" . $newRow['numBathMen'] . "</td>";
					echo "<td>" . $newRow['numUnitsMen'] . "</td>"; 
					echo "<td>" . $newRow['numBathWomen'] . "</td>";
					echo "<td>" . $newRow['numUnitsWomen'] . "</td>"; 
					echo "<td>" . $newRow['numBathUni'] . "</td>";
					echo "<td>" . $newRow['numUnitsUni'] . "</td>"; 
					echo "</tr>";
				}
				echo "</table>";

	?>


<br>
<div align="center" id="editVenues">
  	<fieldset style="width=30%"><legend>Edit Venues</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
  		<tr>
  			<td>Venue ID</td><td> <input name="idNum"></td>
  		</tr>
  		<tr>
  			<td>Manager Name</td><td> <input name="manageName"></td>
  		</tr>
  		<tr>
  			<td>Phone Number</td><td> <input type="text" name="phoneNum"></td>
  		</tr>
  		<tr>
  			<td>Email</td><td> <input type="text" name="email"></td>
  		</tr>
  		<tr>
  		<td><input id="chngVen" type="submit" name = "submit" value="Update Info"></td>
  	</tr>
  	
  </form>
  <?php
    if(isset($_POST['submit'])){
      $user = 'root';
      $password = '';
      $con = 'sittingduckclients';
      $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $id = $_POST["idNum"];
      $manageName = $_POST["manageName"];
      $phoneNum = $_POST["phoneNum"];
      $email = $_POST["email"];
      $sql = mysqli_query($con, "UPDATE `sittingduckclients`.`venues` SET `managerName` = '$manageName', `contactPhoneNum` = '$phoneNum', `contactEmail` = '$email' WHERE `venues`.`id` = $id;"); 
       echo"<script>
       			document.location.href = '/sittingDuckLogin/modules/editVen.php';
			</script>";         
    } 

?>
  <table>
  </fieldset>
</div>
<br>
<div align="center" id="signup">
  	<fieldset style="width=30%"><legend>New Venue</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
		<tr>
  			<td>Venue Name</td><td> <input name="venName"></td>
  		</tr>
  		<tr>
  			<td>Venue Address</td><td> <input name="venAddress"></td>
  		</tr>
  		<tr>
  			<td>Manager Name</td><td> <input name="manageName"></td>
  		</tr>
  		<tr>
  			<td>Phone Number</td><td> <input type="text" name="phoneNum"></td>
  		</tr>
  		<tr>
  			<td>Email</td><td> <input type="text" name="email"></td>
  		</tr>
  		<tr>
  			<td>Number of Mens Bathrooms</td><td> <input name="numBathMen"></td>
  		</tr>
  		<tr>
  			<td>Number of Mens Units</td><td> <input name="numUnitsMen"></td>
  		</tr>
  		<tr>
  			<td>Number of Womens Bathrooms</td><td> <input name="numBathWomen"></td>
  		</tr>
  		<tr>
  			<td>Number of Womens Units</td><td> <input name="numUnitsWomen"></td>
  		</tr>
  		<tr>
  			<td>Number of Unisex Bathrooms</td><td> <input name="numBathUni"></td>
  		</tr>
  		<tr>
  			<td> Number of Unisex Units</td><td> <input name="numUnitsUni"></td>
  		</tr>
  		<tr>
  		<td><input id="chngVen" type="submit" name = "submitNew" value="Add Venue"></td>
  	</tr>
  	
  </form>
  <?php
    if(isset($_POST['submitNew'])){
      $user = 'root';
      $password = '';
      $con = 'sittingduckclients';
      $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $venName = $_POST["venName"];
      $venAddress = $_POST["venAddress"];
      $manageName = $_POST["manageName"];
      $phoneNum = $_POST["phoneNum"];
      $email = $_POST["email"];
      $numBathMen = $_POST["numBathMen"];
      $numBathWomen = $_POST["numBathWomen"];
      $numBathUni = $_POST["numBathUni"];
      $numUnitsMen = $_POST["numUnitsMen"];
      $numUnitsWomen = $_POST["numUnitsWomen"];
      $numBathUni = $_POST["numUnitsUni"];
      $sql = mysqli_query($con, "INSERT INTO `sittingduckclients`.`venues` (`id`, `venName`, `streetAddress`, `dateInstalled`, `numBathMen`, `numBathWomen`, `numBathUni`, `numUnitsMen`, `numUnitsWomen`, `numUnitsUni`, `managerName`, `contactPhoneNum`, `contactEmail`) VALUES (NULL, '$venName', '$venAddress', '', '$numBathMen', '$numBathWomen', '$numBathUni', '$numUnitsMen', '$numUnitsWomen', '$numUnitsUni', '$manageName', '$phoneNum', '$email');"); 
       echo"<script>
       			document.location.href = '/sittingDuckLogin/modules/editVen.php';
			</script>";         
    } 

?>
  <table>
  </fieldset>
</div>
<br>
<div align="center" id="signup">
  	<fieldset style="width=30%"><legend>Remove Venue</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
		<tr>
  			<td>Venue ID</td><td> <input name="venID"></td>
  		</tr>
  		<tr>
  		<td><input id="delVen" type="submit" name = "submitNew" value="Remove Venue"></td>
  	</tr>
  	
  </form>
  <?php
    if(isset($_POST['submitNew'])){
      $user = 'root';
      $password = '';
      $con = 'sittingduckclients';
      $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $id = $_POST["venID"];
      $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`venues` WHERE `venues`.`id` = $id");
      $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`venues` WHERE `venues`.`venName` = ''"); 
       echo"<script>
       			document.location.href = '/sittingDuckLogin/modules/editVen.php';
			</script>";         
    } 

?>
  <table>
  </fieldset>
</div>

<div align = "left">
<p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
</div>
</body>
</html>