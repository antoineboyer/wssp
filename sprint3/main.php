<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/wssp/css/sprint3.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">
          <img src="/wssp/images/armenia_logo.gif" class="img-circle" alt="armenian logo">
        </div>
        <div class="col-md-11">
          <body id="title">
            <h1>WESTERN SURVEY FOR SEISMIC PROTECTION</h1>
          </body>
        </div>
      </div>
      <div class="row">
        <div class="col-md-offset-1 col-md-11">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Map</a></li>
            <li><a href="#">Info</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>  
  </nav>
 <div class="container-fluid">
  <div class="row content">
 		<div class="col-sm-3 sidenav">
			<h2>Side Nav, for futur research options</h2>
 		</div>
 		<div class="col-sm-9">
			<div class="container">
  		<!-- inserer ici le tableau -->
				<?php include("table.php"); ?>
			</div>
 		</div>
	</div>
 </div>
 <footer class="container-fluid">
 <p>Armenian National Survey For Seismic Protection - © 2016 - 2017</p>
 </footer>
</body>
</html>
