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
		$query = mysqli_query($connection,"SELECT * FROM clients");
		echo"\r\n <div align = center><h1>Current Sitting Duck Client Information</h1></div>";
		echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
				<tr>
				<th>Client ID</th>
				<th>Client Name</th>
				<th>Contact Name</th>
				<th>Contact Phone Number</th>
				</tr>";
		while($newRow=mysqli_fetch_array($query, MYSQLI_ASSOC))
				{
					// echo"Here!!";
					// echo $newRow['venName'];
					// echo $newRow['contactPhoneNum'];
					echo "<tr>";
					echo "<td>" . $newRow['id'] . "</td>";
					echo "<td>" . $newRow['clientName'] . "</td>";
					echo "<td>" . $newRow['contactName'] . "</td>";
					echo "<td>" . $newRow['contactPhoneNum'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";

	?>

<br>
<div align="center" id="signup">
  	<fieldset style="width=30%"><legend>Edit Clients</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
  		<tr>
        <td>ID Number</td><td> <input type="text" name="idNum"></td>
      </tr>
  		<tr>
  			<td>Contact Name</td><td> <input name="contactName"></td>
  		</tr>
  		<tr>
  			<td>Phone Number</td><td> <input type="text" name="phoneNum"></td>
  		</tr>
  		<tr>
  		<td><input id="chngClient" type="submit" name = "submit" value="Update Info"></td>
  	</tr>
  	
  </form>
  <?php
    if(isset($_POST['submit'])){
      $user = 'root';
      $password = '';
      $con = 'sittingduckclients';
      $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
      $id = $_POST["idNum"];
      $manageName = $_POST["contactName"];
      $phoneNum = $_POST["phoneNum"];
      $sql = mysqli_query($con, "UPDATE `sittingduckclients`.`clients` SET `contactName` = '$manageName', `contactPhoneNum` = '$phoneNum' WHERE `clients`.`id` = $id;"); 
       echo"<script>
       			document.location.href = '/sittingDuckLogin/modules/editClients.php';
			</script>";         
    } 

?>
  <table>
  </fieldset>

</div>
<br>
<div align="center" id="signup">
  	<fieldset style="width=30%"><legend>New Client</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
  		<tr>
  			<td>Client Name</td><td> <input name="clientName"></td>
  		</tr>
  		<tr>
  			<td>Contact Name</td><td> <input name="contactName"></td>
  		</tr>
  		<tr>
  			<td>Phone Number</td><td> <input type="text" name="phoneNum"></td>
  		<tr>
  		<td><input id="newClient" type="submit" name = "submitNew" value="Add New Client"></td>
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
      $clientName = $_POST["clientName"];
      $contactName = $_POST["contactName"];
      $phoneNum = $_POST["phoneNum"];
      $sql = mysqli_query($con, "INSERT INTO `sittingduckclients`.`clients` (`id`, `clientName`, `contactPhoneNum`, `contactName`) VALUES (NULL, '$clientName', '$phoneNum', '$contactName');"); 
       echo"<script>
       			document.location.href = '/sittingDuckLogin/modules/editClients.php';
			</script>";         
    } 

?>
  <table>
  </fieldset>
</div>
<div align="center" id="signup">
  	<fieldset style="width=30%"><legend>Remove Client</legend>
  		<table border="0">
  		<tr>
  			<!-- <form method="POST" action="connectivity-sign-up.php"> -->
  			<form method="post">
  		</tr>
		<tr>
  			<td>Venue ID</td><td> <input name="clientID"></td>
  		</tr>
  		<tr>
  		<td><input id="delVen" type="submit" name = "submitNew" value="Remove Client"></td>
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
      $id = $_POST["clientID"];
      $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`clients` WHERE `clients`.`id` = $id");
      $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`clients` WHERE `clients`.`clientName` = ''"); 
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