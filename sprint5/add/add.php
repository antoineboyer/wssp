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
	

	
<?php
	//INITIALIZATION OF VARIABLES
	$nowDate = date('Y-m-d', time());
	//FUNCTION WHICH INITIALIZE VARIABLES
	function variable($param)
	{
		$obj="";
		if(isset($_POST[$param]))
		{
		$obj = $_POST[$param];
		}
		return $obj;
	}
	
	//CREATION OF $TABLE WHICH CONTAIN SISMIC VARIABLES 
	$table = array();
	$table['date']   = array(variable('date'),'Date');
	$table['time']   = array(variable('time'),'Time');
	$table['mg']     = array(variable('mg'),'Magnitude');
	$table['typemg'] = array(variable('typemg'),'Type of Magnitude');
	$table['lat']    = array(variable('lat'),'Latitude'); 
	$table['lon']    = array(variable('lon'),'Longitude'); 
	$table['depth']  = array(variable('depth'),'Depth');
	$table['region'] = array(variable('region'),'Region');
	

	
?>

<body onload="onLoad();">
	
 	<nav class="navbar navbar-inverse">
	<?php include("/../navbar.php"); ?>	
	<?php navbar("add"); ?>
	</nav>
	
	<div class="container-fluid">
		<div class="row">
		<br>
    	<div class="col-sm-6">					
       	<div class="well">
			  	<?php include("leftcolumn.php"); ?>	 
        </div>
        </div>
      <div class="col-sm-6">
				<div class="well">
					<?php include("rightcolumn.php"); ?>	
        </div>
      </div>      
    </div>			
	</div>
 
	 <?php include("/../footer.php"); ?>
 
</body>
</html>