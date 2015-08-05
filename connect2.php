<?php
session_start();
$user = 'root';
$password = '';
$db = 'sittingduckclients';

$db = new mysqli('localhost', $user, $password, $db) or die("Unable to connect to the database because of ". mysqli_connect_error());

$data = json_decode( file_get_contents('php://input'));
$username = $data->Myusername;
$userpassword = $data->Mypassword;
$hashedPassword = md5($userpassword);
if (isset($data->Myusername)) {
  if (isset($data->Mypassword)) {
    $query=mysqli_query($db,"SELECT * FROM users WHERE username='$username' && password='$hashedPassword'");
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($count==1)
    {
      if($row['level'] == 'admin'){    
        $_SESSION['username'] = $username;
        $_SESSION['hashPass'] = $hashedPassword;
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['affiliation'] = $row['affiliation'];
        header('Location: /sittingDuckLogin/modules/home/views/home.php');
      }
      else if($row['level'] == 'venue'){
        $_SESSION['username'] = $username;
        $_SESSION['hashPass'] = $hashedPassword;
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['affiliation'] = $row['affiliation'];
        header('Location: /sittingDuckLogin/modules/home/views/venuePage.php');
      }
      else{
        $_SESSION['username'] = $username;
        $_SESSION['hashPass'] = $hashedPassword;
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['affiliation'] = $row['affiliation'];
        header('Location: /sittingDuckLogin/modules/home/views/clientPage.php');
      }
    }
    else
    {
      echo"<script>alert('Incorrect Login Credentials. Please try again.');</script>";
      echo"<script>window.location.replace('/sittingDuckLogin/index.html'); </script>";
    }

  } else {
    echo "Wrong Password";
    echo"<script>alert('Incorrect Login Credentials. Please try again.');</script>";
      echo"<script>window.location.replace('/sittingDuckLogin/index.html'); </script>";
  }
} else {
  echo "userID match";
  echo"<script>alert('Incorrect Login Credentials. Please try again.');</script>";
  echo"<script>window.location.replace('/sittingDuckLogin/index.html'); </script>";
}

?>