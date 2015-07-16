
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Sitting Duck Client Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="modules/home/views/starter-template.css" rel="stylesheet">
    <!--<script src="js/ie-emulation-modes-warning.js"></script>-->

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" data-toggle="tab" href="#home">Sitting Duck Client Login</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a data-toggle="tab" href="#home">Home</a></li>
            <li><a data-toggle="tab" href="#venues">Venues</a></li>
            <li><a data-toggle="tab" href="#clients">Clients</a></li>
            <li><a data-toggle="tab" href="#units">Units</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <?php
          session_start();
         
            echo('
              <div class="starter-template">
              <h1>Welcome '.$_SESSION['firstName'].' '.$_SESSION['lastName'].'!'.'</h1>
              <br>

              <div align= "center" class="lead">

              <fieldset style="width=30%"><legend>New User Registration Form</legend>
                <table border="0">
                <tr>
                  <form action = "/sittingDuckLogin/modules/registration/submitData.php" method="post">
                  <td>First Name</td><td> <input type="text" name="firstName"></td>
                </tr>
                <tr>
                  <td>Last Name</td><td> <input type="text" name="lastName"></td>
                </tr>
                <tr>
                  <td>Username</td><td> <input type="text" name="username"></td>
                </tr>
                <tr>
                  <td>Password</td><td> <input type="password" name="password"></td>
                </tr>
                <tr>
                  <select name="accountType">
                    <option value="reg">Sitting Duck Standard</option>
                    <option value="plus">Sitting Duck Pro</option>
                    <option value="admin">Sitting Duck Administrator</option>
                  </select>

                </tr>
                <tr>
                <td><input id="button" type="submit" name = "submit" value="Sign-Up"></td>
              </tr>
            </form>
            </table>
            </fieldset>
            </div>

            <div align="center" id="signup">
                <fieldset style="width=30%"><legend>Existing Member Removal Form</legend>
                  <table border="0">
                  <tr>
                  <form action ="/sittingDuckLogin/modules/home/views/home.php" method="post">
                    <td>First Name</td><td> <input type="text" name="firstName"></td>
                  </tr>
                  <tr>
                    <td>Last Name</td><td> <input type="text" name="lastName"></td>
                  </tr>
                  <tr>
                    <td>ID Number</td><td> <input type="text" name="idNum"></td>
                  </tr>
                  <tr>
                  <td><input id="delbutton" type="submit" name = "delete" value="Remove"></td>
                </tr>
              </form>
              </table>
              </fieldset>

            </div>

            </div>');


        ?>
      </div>
      <div id="venues" class="tab-pane fade">
        <?php
          $user = 'root';
          $password = '';
          $con = 'sittingduckclients';
          $connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
          // Check connection
          
          if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
          $query = mysqli_query($connection,"SELECT * FROM venues");
          echo"<div id='mainBody'>";
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
              echo'<br>
                  <div align="center" id="editVenues">
                      <fieldset style="width=30%"><legend>Edit Venues</legend>
                        <table border="0">
                        <tr>
                          <!-- <form method="POST" action="connectivity-sign-up.php"> -->
                          <form method="post">
                        </tr>
                        <tr>
                          <td>Venue ID</td><td> <input name="idNum"></td>
                        </tr>
                        <tr>
                          <td>Manager Name</td><td> <input name="manageName"></td>
                        </tr>
                        <tr>
                          <td>Phone Number</td><td> <input type="text" name="phoneNum"></td>
                        </tr>
                        <tr>
                          <td>Email</td><td> <input type="text" name="email"></td>
                        </tr>
                        <tr>
                        <td><input id="chngVen" type="submit" name = "submit" value="Update Info"></td>
                      </tr>
                      
                    </form>
                    </table>
                    </fieldset>
                  </div>';
              echo"</div>";
              if(isset($_POST["submit"])){
                $user = "root";
                $password = "";
                $con = "sittingduckclients";
                $con = new mysqli("localhost", $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
                // Check connection
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $id = $_POST["idNum"];
                $manageName = $_POST["manageName"];
                $phoneNum = $_POST["phoneNum"];
                $email = $_POST["email"];
                $query = "UPDATE `sittingduckclients`.`venues` SET `managerName` = '".$manageName."', `contactPhoneNum` = '".$phoneNum."', `contactEmail` = '".$email."'' WHERE `venues`.`id` = '".$id."';";
                echo "<script type='text/javascript'>alert('$query');</script>";
                $sql = mysqli_query($con, "UPDATE `sittingduckclients`.`venues` SET `managerName` = '".$manageName."', `contactPhoneNum` = '".$phoneNum."', `contactEmail` = '".$email."'' WHERE `venues`.`id` = '".$id."';");        
              } 
        ?>
      </div>
      <div id="clients" class="tab-pane fade">
        <?php
            $user = 'root';
            $password = '';
            $con = 'sittingduckclients';
            $connection = new mysqli('localhost', $user, $password, $con) or die("Unable to connect to the database because of ". mysqli_connect_error());
            $query = mysqli_query($connection,"SELECT * FROM clients");
            echo"<div id='mainBody2'>";
            echo"\r\n <div align = center><h1>Current Sitting Duck Client Information</h1></div>";
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
                echo"</div>";
          ?>
      </div>
      <div id="units" class="tab-pane fade">
        <h3>Menu 3</h3>
        <p>Some content in menu 3.</p>
      </div>
    </div>
    <div class="container">
    </div><!-- /.container -->
    <br>
    <div align = "left">
      <p><a href="/sittingDuckLogin/index.html">Logout</a></a></p>
    </div>

    <script>$('.nav a').on('click', function(){
            $(".btn-navbar").click(); //bootstrap 2.x
            $(".navbar-toggle").click() //bootstrap 3.x by Richard
            });</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
