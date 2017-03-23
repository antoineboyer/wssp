<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/wssp/css/sprint5.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
</head>
<body>
 <nav class="navbar navbar-inverse">
	<?php include("/../navbar.php"); ?>	
	<?php navbar("about"); ?>
	</nav>
	
 <div class="container-fluid">
 	<div class="row content">
		<div class="col-md-2 sidenav">
			<div class = "about">
			<h4>Summary</h4>
			<ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">WSSP</a></li>
        <li><a href="#section2">NSSP</a></li>
        <li><a href="#section3">Members</a></li>
				<li><a href="#section4">Photos</a></li>
      </ul><br>
		</div>
		</div>
		<div class="col-md-10 container">
 		<h4>WSSP</h4>
		<hr>
		<div class="row content">
			<div class="col-sm-6">
				<img src="/wssp/images/wssp1.jpg" class="img-responsive" alt="wssp1">
			</div>
			<div class="col-sm-6">
				<p class="text-justify">Under construction </p>
			</div>
		</div>
		<h4>NSSP</h4>
		<hr>
		<h4>Members</h4>
		<hr>
		<h4>Photos</h4>
		<hr>
		</div>
	</div>
 </div>

	 <?php include("/../footer.php"); ?>

</body>
</html>