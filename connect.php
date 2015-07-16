<?php
 session_start();
$user = 'root';
$password = '';
$db = 'sittingduckclients';

$db = new mysqli('localhost', $user, $password, $db) or die("Unable to connect to the database because of ". mysqli_connect_error());

//echo"You've connected!!";
if($_SESSION['username']){
  header('Location: /sittingDuckLogin/modules/home/views/home.php');
  
}
$data = json_decode( file_get_contents('php://input'));
//echo"\r\nfile contents: ".file_get_contents('php://input');
$username = $data->Myusername;
$userpassword = $data->Mypassword;
$hashedPassword = md5($userpassword);
if (isset($data->Myusername)) {
  if (isset($data->Mypassword)) {
    $query=mysqli_query($db,"SELECT * FROM users WHERE username='$username' && password='$hashedPassword'");
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query, MYSQLI_ASSOC);

    //echo"\r\nNumRows: ".mysqli_num_rows($query);
    //echo"\r\nFetchArray: ".mysqli_fetch_array($query);
   
    if ($count==1)//need to divide by level
    {
    	// echo $row["id"]; 
      $_SESSION['username'] = $username;
      $_SESSION['hashPass'] = $hashedPassword;
      $_SESSION['firstName'] = $row['firstName'];
      $_SESSION['lastName'] = $row['lastName'];
      // echo($_SESSION['username']);
      // echo($_SESSION['hashPass']);
     // echo $response = $row;

    //	echo"in success";
    //  echo "\r\n".$response;
     header('Location: /sittingDuckLogin/modules/home/views/home.php');
     // exit;
    }
    else
    {
      echo $response = null;
    }

  } else {
    echo "password wrong";
  }
} else {
  echo "userID match";
}

?>