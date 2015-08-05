<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Sitting Duck Client Login</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="modules/home/views/starter-template.css" rel="stylesheet">

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
        <a class="navbar-brand" data-toggle="tab" href="#home"><div>Sitting Duck Client Login <img src='sittingDuckBlackBackground.jpg' alt='Home!' width='30px' height='auto'></div></a>
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
  <?php session_start(); ?>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="starter-template">
        <h1>Welcome <?php echo($_SESSION['firstName']); ?> <?php echo($_SESSION['lastName']); ?>!</h1>
        <br>
        <div align= "center" class="lead">
          <fieldset style="width=30%"><legend>New User Registration Form</legend>
            <table border="0">  
              <form method="post">
                <tr>
                  <td>First Name</td><td> <input type="text" id="firstName"></td>
                </tr>
                <tr>
                  <td>Last Name</td><td> <input type="text" id="lastName"></td>
                </tr>
                <tr>
                  <td>Username</td><td> <input type="text" id="username"></td>
                </tr>
                <tr>
                  <td>Password</td><td> <input type="password" id="password"></td>
                </tr>
                <tr>
                  <td>Affiliated Company</td><td> <input type="text" id="affiliation"></td>
                </tr>
                <tr>
                  <select id="accountType">
                    <option value="client">Sitting Duck Client</option>
                    <option value="venue">Sitting Duck Venue</option>
                    <option value="admin">Sitting Duck Administrator</option>
                  </select>
                </tr>
                <tr>
                  <td><input id="regUser" type="submit" value="Sign-Up"></td>
                </tr>
              </form>
            </table>
          </fieldset>
          <script src="/sittingDuckLogin/modules/home/views/regUser.js"></script>
        </div>

        <div align="center" id="signup">
          <fieldset style="width=30%"><legend>Existing Member Removal Form</legend>
            <table border="0">
              <form method="post">
                <tr>
                  <td>ID Number</td><td> <input type="text" id="delUserIDNum"></td>
                </tr>
                <tr>
                  <td><input type="submit" id = "delUser" value="Remove"></td>
                </tr>
              </form>
            </table>
          </fieldset>
          <script src="/sittingDuckLogin/modules/home/views/delUser3.js"></script>
        </div>
      </div>
    </div>
    <div id="venues" class="tab-pane fade">
      <div id="tableHolder"></div>
      <script type="text/javascript">
      $(document).ready(function(){
        drawTable();
      });

      function drawTable(){
        $('#tableHolder').load('/sittingDuckLogin/modules/home/views/send.php', function(){
        });
      }
      </script>
      <div id='mainBody'>
        <br>
        <div align="center" id="editVenues">
          <fieldset style="width=30%"><legend>Edit Venues</legend>
            <table border="0">
              <form method="post">
                <tr>
                  <td>Venue ID</td><td> <input name="idNum" id="idNum"></td>
                </tr>
                <tr>
                  <td>Manager Name</td><td> <input name="manageName" id="manageName"></td>
                </tr>
                <tr>
                  <td>Phone Number</td><td> <input type="text" name="phoneNum" id="phoneNum"></td>
                </tr>
                <tr>
                  <td>Email</td><td> <input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                  <td><input id="chngVen" type="submit" name = "chngVen" value="Update Info"></td>
                </tr>
              </form>
            </table>
          </fieldset>
          <script src="/sittingDuckLogin/modules/home/views/chngVen.js"></script>
        </div>
        <br>
        <div align="center" id="signup">
          <fieldset style="width=30%"><legend>New Venue</legend>
            <table border="0">
              <form method="post">
                <tr>
                  <td>Venue Name</td><td> <input id="venName"></td>
                </tr>
                <tr>
                  <td>Venue Address</td><td> <input id="venAddress"></td>
                </tr>
                <tr>
                  <td>Manager Name</td><td> <input id="newManageName"></td>
                </tr>
                <tr>
                  <td>Phone Number</td><td> <input type="text" id="newPhoneNum"></td>
                </tr>
                <tr>
                  <td>Email</td><td> <input type="text" id="newEmail"></td>
                </tr>
                <tr>
                  <td>Number of Mens Bathrooms</td><td> <input id="numBathMen"></td>
                </tr>
                <tr>
                  <td>Number of Mens Units</td><td> <input id="numUnitsMen"></td>
                </tr>
                <tr>
                  <td>Number of Womens Bathrooms</td><td> <input id="numBathWomen"></td>
                </tr>
                <tr>
                  <td>Number of Womens Units</td><td> <input id="numUnitsWomen"></td>
                </tr>
                <tr>
                  <td>Number of Unisex Bathrooms</td><td> <input id="numBathUni"></td>
                </tr>
                <tr>
                  <td> Number of Unisex Units</td><td> <input id="numUnitsUni"></td>
                </tr>
                <tr>
                  <td><input id="newVen" type="submit" value="Add Venue"></td>
                </tr>
              </form>
            </table>
          </fieldset>
          <script src="/sittingDuckLogin/modules/home/views/newVen2.js"></script>
        </div>
        <br>
        <div align="center" id="signup">
          <fieldset style="width=30%"><legend>Remove Venue</legend>
            <table border="0">
              <form method="post">
                <tr>
                  <td>Venue ID</td><td> <input id="venID"></td>
                </tr>
                <tr>
                  <td><input id="delVen" type="submit" value="Remove Venue"></td>
                </tr>
              </form>
            </table>
          </fieldset>
          <script src="/sittingDuckLogin/modules/home/views/delVen3.js"></script>
        </div>
      </div>
    </div>
    <div id="clients" class="tab-pane fade">
      <div align = center><h1>Current Sitting Duck Client Information</h1></div>
      <div class = "starter-template" id="tableHolder2"></div>
      <script type="text/javascript">
      $(document).ready(function(){
        refreshTable();
      });

      function refreshTable(){
        $('#tableHolder2').load('/sittingDuckLogin/modules/home/views/clientSend.php', function(){
        });
      }
      </script>

      <div align="center" id="signup">
        <fieldset style="width=30%"><legend>Edit Clients</legend>
          <table border="0">
            <form method="post">
              <tr>
                <td>ID Number</td><td> <input type="text" id="cliIDNum"></td>
              </tr>
              <tr>
                <td>Contact Name</td><td> <input id="cliContactName"></td>
              </tr>
              <tr>
                <td>Phone Number</td><td> <input type="text" id="cliPhoneNum"></td>
              </tr>
              <tr>
                <td><input id="chngClient" type="submit" value="Update Info"></td>
              </tr>
            </form>
          </table>
        </fieldset>
        <script src="/sittingDuckLogin/modules/home/views/chngClient3.js"></script>
      </div>
      <br>
      <div align="center" id="signup">
        <fieldset style="width=30%"><legend>New Client</legend>
          <table border="0">
            <form method="post">
              <tr>
                <td>Client Name</td><td> <input id="newClientName"></td>
              </tr>
              <tr>
                <td>Contact Name</td><td> <input id="newContactName"></td>
              </tr>
              <tr>
                <td>Phone Number</td><td> <input type="text" id="newCliPhoneNum"></td>
              </tr>
              <tr>
                <td><input id="newClient" type="submit" value="Add New Client"></td>
              </tr>
            </form>
          </table>
        </fieldset>
        <script src="/sittingDuckLogin/modules/home/views/newClient.js"></script>
      </div>
      <br>
      <div align="center" id="signup">
        <fieldset style="width=30%"><legend>Remove Client</legend>
          <table border="0">
            <form method="post">
              <tr>
                <td>Venue ID</td><td> <input id="delClientID"></td>
              </tr>
              <tr>
                <td><input id="delCli" type="submit" value="Remove Client"></td>
              </tr>
            </form>
          </table>
        </fieldset>
        <script src="/sittingDuckLogin/modules/home/views/delClient.js"></script>
      </div>
    </div>
    <div id="units" class="tab-pane fade">
      <div class="starter-template">
        <div id="tableHolder3"></div>
        <br>
        <fieldset style="width=30%"><legend>Search All Units</legend>
          <div align = "center">
            <table border="0">
              <form method="post">
                <tr>
                  <td>Search by Client</td><td> <input type="text" id="searchClient"></td>
                  <td><input id="searchUnitClient" type="submit" value="Search"></td>
                </tr>
                <tr>
                  <td>Search by Venue</td><td> <input type="text" id="searchVenue"></td>
                  <td><input id="searchUnitVenue" type="submit" value="Search"></td>
                </tr>
              </form>
            </table>
          </div>
        </fieldset>
        <script src="/sittingDuckLogin/modules/home/views/searchClient.js"></script>
        <script src="/sittingDuckLogin/modules/home/views/searchVenue2.js"></script>
      </div>
    </div>
  </div>
  <div class="container">
  </div><!-- /.container -->
  <div align = "left">
    <p><a href="/sittingDuckLogin/index.html">Logout</a></p>
  </div>

  <script>$('.nav a').on('click', function(){
            $(".btn-navbar").click();
            $(".navbar-toggle").click() 
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
