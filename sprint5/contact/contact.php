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
<body onload="onLoad();">
 	<nav class="navbar navbar-inverse">
	<?php include("/../navbar.php"); ?>	
	<?php navbar("contact"); ?>
	</nav>
 <div class="container-fluid">
 	<div class="row">
		<br>
        <div class="col-sm-6">
					
            <div class="well">
								
                <h3 style="line-height:20%;"><i class="fa fa-home fa-1x" style="line-height:6%;color:#339966"></i> Address:</h3>               
                <p style="margin-top:6%;line-height:35%">Garni Geophysical Observatory - Garni, 2215, Arménie</p>
                <br />
                <br />
                <h3 style="line-height:20%;"><i class="fa fa-envelope fa-1x" style="line-height:6%;color:#339966"></i> E-mail adress:</h3>
                <p style="margin-top:6%;line-height:35%">garni@gmail.com</p>
                <br />
                <br />
                <h3 style="line-height:20%;"><i class="fa fa-user fa-1x" style="line-height:6%;color:#339966"></i> Telephone Number</h3>
                <p style="margin-top:6%;line-height:35%">+374 51910121</p>
                <br />
                <br />
                <h3 style="line-height:20%;"><i class="fa fa-yelp fa-1x" style="line-height:6%;color:#339966"></i> WebSite of NSSP:</h3>
                <p style="margin-top:6%;line-height:35%"><a href="http://www.nssp-gov.am/index_eng.htm">NSSP</a></p>
            </div>
        </div>
        <div class="col-sm-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34512.06349498853!2d44.73335107533616!3d40.13194103993709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc311f2864b65cc47!2sGarni+Geophysical+Observatory!5e0!3m2!1sfr!2sfr!4v1488354284820" width="700" height="473" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
 </div>
 
	 <?php include("/../footer.php"); ?>
 
</body>
</html>