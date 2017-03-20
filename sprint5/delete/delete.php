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
		/*$nowDate = date('Y-m-d', time());
		$start_date = date('Y-m-d', strtotime('-2 year'));
		$end_date= $nowDate;
		$start_mag=1;
		$end_mag=8;*/

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
		$table = array();
		$table['start_date']   = variable('start_date');
		$table['end_date']   = variable('end_date');
		$table['start_mag']   = variable('start_mag');
		$table['end_mag']   = variable('end_mag');
?>
<body onload="onLoad();">
 	<nav class="navbar navbar-inverse">
	<?php include("/../navbar.php"); ?>	
	<?php navbar("delete"); ?>
	</nav>
	
 <div class="container-fluid">
		<div class="row">
		<br>
    	<div class="col-sm-6">
      	<div class="well">
					<h3>Search Events</h3>
						<hr>
						<form action="delete.php" class="well form-horizontal" method="post">
							
							<div class="row">
								<div class=" col-sm-offset-4 col-sm-4 ">
									<legend>Magnitude:</legend>
									<label for="start_mag">From - </label>
									<select name="start_mag" id="start_mag" class="form-control">
										<option value="1" <?php if($table['start_mag']==1) echo 'selected' ?>>1</option>
										<option value="2" <?php if($table['start_mag']==2) echo 'selected' ?>>2</option>
										<option value="3" <?php if($table['start_mag']==3) echo 'selected' ?>>3</option>
										<option value="4" <?php if($table['start_mag']==4) echo 'selected' ?>>4</option>
										<option value="5" <?php if($table['start_mag']==5) echo 'selected' ?>>5</option>
										<option value="6" <?php if($table['start_mag']==6) echo 'selected' ?>>6</option>
										<option value="7" <?php if($table['start_mag']==7) echo 'selected' ?>>7</option>
										<option value="8" <?php if($table['start_mag']==8) echo 'selected' ?>>8</option>
										<option value="9" <?php if($table['start_mag']==9) echo 'selected' ?>>9</option>
									</select>
									<label for="end_mag">To - </label>
									<select name="end_mag" id="end_mag" class="form-control">
										<option value="1" <?php if($table['end_mag']==1) echo 'selected' ?>>1</option>
										<option value="2" <?php if($table['end_mag']==2) echo 'selected' ?>>2</option>
										<option value="3" <?php if($table['end_mag']==3) echo 'selected' ?>>3</option>
										<option value="4" <?php if($table['end_mag']==4) echo 'selected' ?>>4</option>
										<option value="5" <?php if($table['end_mag']==5) echo 'selected' ?>>5</option>
										<option value="6" <?php if($table['end_mag']==6) echo 'selected' ?>>6</option>
										<option value="7" <?php if($table['end_mag']==7) echo 'selected' ?>>7</option>
										<option value="8" <?php if($table['end_mag']==8) echo 'selected' ?>>8</option>
										<option value="9" <?php if($table['end_mag']==9) echo 'selected' ?>>9</option>
									</select>
								</div>
							</div>
							
							<div class="row">
							 	<div class="col-sm-offset-4 col-sm-4">
									<legend>Date:</legend>
									<label for="start_date">- From</label>
									<input type="date" name="start_date" min="0000-00-00" value ="<?php echo $table['start_date']?>" class="form-control"  >
									<label for="end_date">- To</label>
									<input type="date" name="end_date" max="2100-00-00" value = "<?php echo $table['end_date']?>" class="form-control" ><br>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-offset-4 col-sm-4">
									<input type="submit" class="btn btn-success" name="search" value="Search">
								</div>
							</div>
						</form>
				</div>
			</div>
	 
	 
		
    	<div class="col-sm-6">
      	<div class="well">
					<?php include("deleterightcolumn.php"); ?>
					
				</div>
			</div>
	 </div>
								
 </div>
	
	 <?php include("/../footer.php"); ?>
  
</body>
</html>