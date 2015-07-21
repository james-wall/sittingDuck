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
  $numUnitsUni = $_POST["numUnitsUni"];
  $sql = mysqli_query($con, "INSERT INTO `sittingduckclients`.`venues` (`id`, `venName`, `streetAddress`, `dateInstalled`, `numBathMen`, `numBathWomen`, `numBathUni`, `numUnitsMen`, `numUnitsWomen`, `numUnitsUni`, `managerName`, `contactPhoneNum`, `contactEmail`) VALUES (NULL, '$venName', '$venAddress', '', '$numBathMen', '$numBathWomen', '$numBathUni', '$numUnitsMen', '$numUnitsWomen', '$numUnitsUni', '$manageName', '$phoneNum', '$email');"); 
   $query = mysqli_query($con,"SELECT * FROM venues");
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
          echo"</div>"; 
    ?>