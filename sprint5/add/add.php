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
	$nowDate = date('Y-m-d', time());
	//Initialisation des variables
	function variable($param)
	{
		$obj="";
		if(isset($_POST[$param]))
		{
		$obj = $_POST[$param];
		}
		return $obj;
	}
	$table = array();
	$table['date']   = variable('date');
	$table['time']   = variable('time');
	$table['mg']     = variable('mg');
	$table['typemg'] = variable('typemg');
	$table['lat']    = variable('lat'); 
	$table['lon']    = variable('lon'); 
	$table['depth']  = variable('depth');
	$table['region'] = variable('region'); 
	
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
								
               <h3>Add an Event</h3>
								<hr>
								<form action="add.php" class="well form-horizontal" method="post">
									<fieldset>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Date: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="date" name="date" min="0000-00-00" max="<?php echo $nowDate ?>" value ="<?php echo $date ?>" class="form-control"  >
											</div>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Time: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="time" name="time" value ="<?php echo $time ?>" class="form-control"  >
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Magnitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="mg" min="0" max="10" step="0.1" value="<?php echo $mg ?>" class="form-control">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Magnitude Type: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<select name="typemg" class="form-control">
													<option value="m" <?php if($typemg=="m") echo 'selected' ?> >M</option>
													<option value="ml" <?php if($typemg=="ml") echo 'selected' ?> >ML</option>
													<option value="md" <?php if($typemg=="md") echo 'selected' ?> >MD</option>
													<option value="mb" <?php if($typemg=="mb") echo 'selected' ?> >MB</option>
													<option value="ms" <?php if($typemg=="ms") echo 'selected' ?> >MS</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="form-group">	
										<label class="col-sm-4 control-label">Latitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="lat" min="0" max="90" step="0.01" value="<?php echo $lat ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Longitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="lon" min="-180" max="180" step="0.01" value="<?php echo $lon ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Depth (km): </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">
												<input type="number" name="depth" min="0" max="6000" step="1" value="<?php echo $depth ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Region: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">
												<input  name="region" class="form-control"  type="text" maxlength="20" value="<?php echo $region ?>">
											</div>
										</div>
									</div>
									
									<div class="form-group">
  									<label class="col-md-4 control-label"></label>
										<div class="col-md-4">
											<button type="submit" class="btn btn-warning" name="submit">Send <span class="glyphicon glyphicon-send"></span></button>
										</div>
									</div>
										
									</fieldset>
							</form>
							
							<hr>
            </div>
        </div>
        <div class="col-sm-6">
					<div class="well">
						<?php include("cible.php"); ?>	
           </div>
        </div>
            
        </div>
    
									
							
				
				</div>
 
	 <?php include("/../footer.php"); ?>
 
</body>
</html>