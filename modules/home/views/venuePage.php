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
  <h1>Welcome Venue Partner!</h1>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" data-toggle="tab" href="#home"><div>Sitting Duck Client Login <img src='sittingDuckBlackBackground.jpg' alt='Home!' width='30px' height='auto'></div></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a data-toggle="tab" href="#home">Home</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>  
  <div id="tableHolder5"></div>
  <script src="/sittingDuckLogin/modules/home/views/searchVenueMod.js"></script>     
  <div align = "left">
    <p><a href="/sittingDuckLogin/index.html">Logout</a></p>
  </div>
  <script>$('.nav a').on('click', function(){
            $(".btn-navbar").click(); //bootstrap 2.x
            $(".navbar-toggle").click() //bootstrap 3.x by Richard
          });
  </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
  </html>
