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
<div align="center">
	<a href='http://www.sittingduckads.com/' target='_newtab'><img src='sittingDuckLogo.png' alt='Home!' width='100px' height='auto'></a>;
</div>
	<?php

	// session_start();
	// if (isset($_SESSION['username']))
	// {
	// 	unset($_SESSION['username']);
	// 	unset($_SESSION['userpassword']);
	// }

	$user = 'root';
	$password = '';
	$con = 'sittingduckclients';
//echo"here!!!!!";
	$connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$data = json_decode( file_get_contents('php://input'));
//echo"\r\nfile contents: ".file_get_contents('php://input')."end of file contents";
	// session_start();
	// if($data){	
		$username = $data->Myusername;
		$userpassword = $data->Mypassword;
		// $_SESSION['username'] = $username;
	 // 	$_SESSION['userpassword'] = md5($userpassword);
	// // }
	// else{
	// 	$username = $_SESSION['user'];
	// 	$userpassword = $_SESSION['pass'];
	// 	$_SESSION['user'] = $username;
	// 	$_SESSION['pass'] = $userpassword;
	// }
// echo"\r\nUsername: ".$username;
// echo"\r\nPassword: ".$userpassword;

	$hashedPassword = md5($userpassword); //MIGHT NOT WANT TO DO MD5 FOR SECURITY REASONS LATER
	// echo($hashedPassword);

	if (isset($data->Myusername)) {
		if (isset($data->Mypassword)) {
			$query=mysqli_query($connection,"SELECT * FROM users WHERE username='$username' && password='$hashedPassword'");
			$count=mysqli_num_rows($query);
		// $row=mysqli_fetch_array($query, MYSQLI_ASSOC);
			//$row2=mysqli_fetch_array($query, MYSQLI_ASSOC);

    //echo"\r\nNumRows: ".mysqli_num_rows($query);
    //echo"\r\nFetchArray: ".mysqli_fetch_array($query);

			if ($count==1)
			{

		//	$result = mysqli_query($con,"SELECT * FROM Persons");
			// echo "\r\nHere 1!";
				// echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
				// <tr>
				// <th>id number</th>
				// <th>username</th>
				// </tr>";
				echo"<div align='center'>";
				while($row=mysqli_fetch_array($query, MYSQLI_ASSOC))
				{
					$level = $row['level'];
					if($row['level'] === 'admin'){
						echo"<h2 style ='word-wrap:break-word'>Welcome Admin ".$row['firstName']." ".$row['lastName']."!</h2>";
					}
					else if($row['level'] === 'plus'){
						echo"<h2 style ='word-wrap:break-word'> Hi ".$row['firstName']." ".$row['lastName'].", </h2>"; 
						echo "<p style ='word-wrap:break-word'>Welcome to your personalized Sitting Duck Advertisements <b><u>Pro</u></b> Data Analytics </p>";
					}
					else{
						echo"<h2 style ='word-wrap:break-word'> Hi ".$row['firstName']." ".$row['lastName'].", </h2>"; 
						echo "<p style ='word-wrap:break-word'>Welcome to your personalized Sitting Duck Advertisements Data Analytics </p>";
					}
				// echo "<tr>";
				// echo "<td>" . $row['id'] . "</td>";
				// echo "<td>" . $row['username'] . "</td>"; //can repeat for as many tables as necessary
				// echo "</tr>";
			}
			echo"</div>";
			// echo "</table>";
			// echo"</div>";
			mysqli_close ( $connection );
			if($level === 'admin'){
				$user = 'root';
				$password = '';
				$con = 'sittingduckclients';
				$newCon = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
				$newQuery = mysqli_query($newCon,"SELECT * FROM venues"); //may need single quotes instead of what we have
				// echo($newQuery);
				// $newCount=mysqli_num_rows($newQuery);
				// echo($newCount);
				// echo"\r\n New Query: ";
				// echo($newQuery);
				// $newCount=mysqli_num_rows($newQuery);
				echo"\r\n <br><div align = center><b>Current Sitting Duck Venue Information</b></div>";
				echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
				<tr>
				<th>Venue Name</th>
				<th>Manager Name</th>
				<th>Contact Phone Number</th>
				</tr>";
				while($newRow=mysqli_fetch_array($newQuery, MYSQLI_ASSOC))
				{
					// echo"Here!!";
					// echo $newRow['venName'];
					// echo $newRow['contactPhoneNum'];
					echo "<tr>";
					echo "<td>" . $newRow['venName'] . "</td>";
					echo "<td>" . $newRow['managerName'] . "</td>";
					echo "<td>" . $newRow['contactPhoneNum'] . "</td>"; 
					echo "</tr>";
				}
				echo "</table>";
				echo"<button id='chngVen'>Edit Venue Information</button>
							  <script>
							    var btn = document.getElementById('chngVen');
							    btn.addEventListener('click', function() {
							      document.location.href = '/sittingDuckLogin/modules/editVen.php';
							    });
							  </script>";
				echo"<br>";
				echo"</div>";

				$newQuery = mysqli_query($newCon,"SELECT * FROM clients"); //may need single quotes instead of what we have
				echo"\r\n <br><div align = center><b>Current Sitting Duck Client Information</b></div>";
				echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
				<tr>
				<th>Client Name</th>
				<th>Manager Name</th>
				<th>Contact Phone Number</th>
				</tr>";
				while($newRow=mysqli_fetch_array($newQuery, MYSQLI_ASSOC))
				{					
					echo "<tr>";
					echo "<td>" . $newRow['clientName'] . "</td>";
					echo "<td>" . $newRow['contactName'] . "</td>";
					echo "<td>" . $newRow['contactPhoneNum'] . "</td>"; //can repeat for as many tables as necessary
					echo "</tr>";
				}
				echo "</table>";
				echo"<button id='chngClient'>Edit Client Information</button>
							  <script>
							    var btn = document.getElementById('chngClient');
							    btn.addEventListener('click', function() {
							      document.location.href = '/sittingDuckLogin/modules/editClients.php';
							    });
							  </script>";
				echo"</div>";
				echo"<button id='myBtn'>New User Registration</button>
							  <script>
							    var btn = document.getElementById('myBtn');
							    btn.addEventListener('click', function() {
							      document.location.href = '/sittingDuckLogin/modules/registration/reg.php';
							    });
							  </script>";
				echo"<br>";
				echo"<button id='delBtn'>Remove Existing User</button>
							  <script>
							    var btn = document.getElementById('delBtn');
							    btn.addEventListener('click', function() {
							      document.location.href = '/sittingDuckLogin/modules/registration/del.php';
							    });
							  </script>";
				echo"<br>";
				// echo"<button id='lvlBtn'>Change Account Level</button>
				// 			  <script>
				// 			    var btn = document.getElementById('lvlBtn');
				// 			    btn.addEventListener('click', function() {
				// 			      document.location.href = '/sittingDuckLogin/modules/newLevel.html';
				// 			    });
				// 			  </script>";
			}
			mysqli_close($newCon);
			// echo "end";
    		//echo $row["id"]; //can change to any column
		}
		else
		{	

			echo"
			<script>
				console.log('error2...');
                window.alert('Wrong username or password! Please try again');
                window.location.replace('/sittingDuckLogin/index.html');
			</script>";
			//  header("Location: /sittingDuckLogin/index.html");
			// //header("Location: /sittingDuckLogin/modules/authentication/views/login.html");
			// exit;
			// die();
			//echo "Here 2!";
			//echo $response = null;
		}

	} else {
		echo"
			<script>
				console.log('error3...');
                window.alert('Wrong username or password! Please try again');
                window.location.replace('/sittingDuckLogin/index.html');
			</script>";
		//echo "password wrong";
	}
} else {
	echo"
			<script>
				console.log('error4...');
                window.alert('Wrong username or password! Please try again');
                window.location.replace('/sittingDuckLogin/index.html');
			</script>";
	//echo "userID match";
}
?>
<!-- <head>
	<style>
	body {
		background-color: DeepSkyBlue;
		font: "Trebuchet MS", Helvetica, sans-serif;
	}
	table{
		background-color: white;
	}
	</style>


	<meta charset="utf-8" />
	<title>Sitting Duck Client Login</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" /> 
</head>
<body> -->
	<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  </head>

	
	<!-- <h1>Home</h1> -->
	
<p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
</body>
</html>