<!DOCTYPE html>
<html ng-app="BasicHttpAuthExample">
  <head>
    <meta charset="utf-8" />
    <title>Success!</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  </head>

 <body style="overflow: hidden"> 
  <h1>Successfully removed<?php $_POST["firstName"];?> <?php $_POST["lastName"];?> from system</h1>
  <?php
    if(isset($_POST['delete'])){
      $user = 'root';
      $password = '';
      $con = 'sittingduckclients';
      $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $id = $_POST['idNum'];
      $dup = mysqli_query($con, "SELECT id FROM users WHERE id='".$id."'");
        if(mysqli_num_rows($dup) === 0){
          echo "<script type='text/javascript'>alert('The queried user does not exist in the Sitting Duck database. Please try again');</script>";
          echo "<script type='text/javascript'>document.location.href = '/sittingDuckLogin/modules/registration/del.php';</script>";
        }
        else{
          $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`users` WHERE `users`.`id` = $id");  
        }
    }   
?>
<p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
</body>
</html>