<?php
    $user = 'root';
    $password = '';
    $con = 'sittingduckclients';
    $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
    $id = $_POST["idNum"];
    $manageName = $_POST["contactName"];
    $phoneNum = $_POST["phoneNum"];
    $sql = mysqli_query($con, "UPDATE `sittingduckclients`.`clients` SET `contactName` = '$manageName', `contactPhoneNum` = '$phoneNum' WHERE `clients`.`id` = $id;"); 
    $query = mysqli_query($con,"SELECT * FROM clients");
    echo"<div id='mainBody2'>";
    echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
    <tr>
    <th>Client ID</th>
    <th>Client Name</th>
    <th>Contact Name</th>
    <th>Contact Phone Number</th>
    </tr>";
    while($newRow=mysqli_fetch_array($query, MYSQLI_ASSOC))
    {
      echo "<tr>";
      echo "<td>" . $newRow['id'] . "</td>";
      echo "<td>" . $newRow['clientName'] . "</td>";
      echo "<td>" . $newRow['contactName'] . "</td>";
      echo "<td>" . $newRow['contactPhoneNum'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo"</div>";
?>