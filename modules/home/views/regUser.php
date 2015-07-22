<?php
    $user = 'root';
    $password = '';
    $con = 'sittingduckclients';
    $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    $accountType = $_POST["accountType"];
    $affiliation = $_POST["affiliation"];
    $dup = mysqli_query($con, "SELECT username FROM users WHERE username='".$username."'");
      if(mysqli_num_rows($dup) >0){
          echo "<script type='text/javascript'>alert('This username is currently taken by another Sitting Duck user. Please choose a different username');</script>";
      }
      else{
        $sql = mysqli_query($con, "INSERT INTO `sittingduckclients`.`users` (`id`, `level`, `username`, `password`, `firstName`, `lastName`, `affiliation`) VALUES (NULL, '$accountType', '$username', MD5('$userPassword'), '$firstName', '$lastName', '$affiliation');"); 
        echo"success!";
      }
             
       
?>