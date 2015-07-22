<?php
    session_start();
    $user = 'root';
    $password = '';
    $con = 'sittingduckclients';
    $con = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $venue = $_SESSION['affiliation'];
    $query = mysqli_query($con,"SELECT * FROM `units` WHERE location = '$venue'");
    echo "\r\n <div align='center'><table border='1' style ='word-wrap:break-word'>
    <tr>
    <th>Unit ID</th>
    <th>Unit Location</th>
    <th>Unit Client</th>
    </tr>";
    while($newRow=mysqli_fetch_array($query, MYSQLI_ASSOC))
    {
      echo "<tr>";
      echo "<td>" . $newRow['id'] . "</td>";
      echo "<td>" . $newRow['location'] . "</td>";
      echo "<td>" . $newRow['client'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo"</div>";
     
?>