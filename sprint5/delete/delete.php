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
										<option value=""></option>
										<option value="1" <?php if($start_mag==1) echo 'selected' ?> >1</option>
										<option value="2" <?php if($start_mag==2) echo 'selected' ?>>2</option>
										<option value="3" <?php if($start_mag==3) echo 'selected' ?>>3</option>
										<option value="4" <?php if($start_mag==4) echo 'selected' ?>>4</option>
										<option value="5" <?php if($start_mag==5) echo 'selected' ?>>5</option>
										<option value="6" <?php if($start_mag==6) echo 'selected' ?>>6</option>
										<option value="7" <?php if($start_mag==7) echo 'selected' ?>>7</option>
										<option value="8" <?php if($start_mag==8) echo 'selected' ?>>8</option>
										<option value="9" <?php if($start_mag==9) echo 'selected' ?>>9</option>
									</select>
									<label for="end_mag">To - </label>
									<select name="end_mag" id="end_mag" class="form-control">
										<option value=""></option>
										<option value="1" <?php if($end_mag==1) echo 'selected' ?>>1</option>
										<option value="2" <?php if($end_mag==2) echo 'selected' ?>>2</option>
										<option value="3" <?php if($end_mag==3) echo 'selected' ?>>3</option>
										<option value="4" <?php if($end_mag==4) echo 'selected' ?>>4</option>
										<option value="5" <?php if($end_mag==5) echo 'selected' ?>>5</option>
										<option value="6" <?php if($end_mag==6) echo 'selected' ?>>6</option>
										<option value="7" <?php if($end_mag==7) echo 'selected' ?>>7</option>
										<option value="8" <?php if($end_mag==8) echo 'selected' ?>>8</option>
										<option value="9" <?php if($end_mag==9) echo 'selected' ?>>9</option>
									</select>
								</div>
							</div>
							
							<div class="row">
							 	<div class="col-sm-offset-4 col-sm-4">
									<legend>Date:</legend>
									<label for="start_date">- From</label>
									<input type="date" name="start_date" min="0000-00-00" value ="<?php echo $start_date ?>" class="form-control"  >
									<label for="end_date">- To</label>
									<input type="date" name="end_date" max="2100-00-00" value = "<?php echo $end_date ?>" class="form-control" ><br>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-offset-4 col-sm-4">
									<input type="submit" class="btn btn-success" name="action" value="Search">
								</div>
							</div>
						</form>
				</div>
			</div>
	 
	 
		
    	<div class="col-sm-6">
      	<div class="well">
					
					
				</div>
			</div>
	 </div>
								
 </div>
	
	 <?php include("/../footer.php"); ?>
  
</body>
</html>