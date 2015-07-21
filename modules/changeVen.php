  <?php
      echo'<script>alert("did it!");</script>';
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
?>