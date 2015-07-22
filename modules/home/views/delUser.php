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
    $id = $_POST['id'];
    $dup = mysqli_query($con, "SELECT id FROM users WHERE id='".$id."'");
    if(mysqli_num_rows($dup) === 0){
      echo "<script type='text/javascript'>alert('The queried user does not exist in the Sitting Duck database. Please try again');</script>";
    }
    else{
      $sql = mysqli_query($con, "DELETE FROM `sittingduckclients`.`users` WHERE `users`.`id` = $id");  
      echo"success!";
    }      
?>