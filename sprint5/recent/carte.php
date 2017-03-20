<?php
//API GOOGLE MAP
require('/../../API/GoogleMapAPI.class.php');

//Creating a new map : $map.
$map = new GoogleMapAPI('map');

//Add key Google Maps.
$map->setAPIKey('AIzaSyBH03AAep0MnWcLF3PfvBnZ-cpjpFoRXLA');
    
// Designing the map
$map->setWidth("550px");
$map->setHeight("450px");
$map->setCenterCoords ('45', '40');
$map->setZoomLevel (8);
$map->enableScaleControl();  
$map->disableDirections();

//Get the date of today
date_default_timezone_set('Europe/London');

$nowDateTime = date_create(date('Y-m-d H:i:s', time()));
$nowDate = date('Y-m-d', time());

//Defining default start_date, end_date, start_mag, end_mag

$start_date = date('Y-m-d', strtotime('-2 year'));
$end_date= $nowDate;
$start_mag=1;
$end_mag=8;
//Connection to the database
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=wssp;charset=utf8', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//Building the request
$request = 'SELECT * FROM events';
if(isset($_POST['action']))
{
	if($_POST['action']=='Search')
	{
		if(isset($_POST['start_date']) && isset($_POST['end_date']))
		{
			$start_date =$_POST['start_date'];
			$end_date =$_POST['end_date'];
			// Une idée simple de comparaison des dates...
			/*
			$start = new DateTime($start); $start = $start->format('Ymd'); $end =$_POST['end_date'];$end = new DateTime($end);$end = $end->format('Ymd'); $diff = $end - $start*/
			$request=$request.' WHERE date BETWEEN \''.$start_date.'\' AND \''.$end_date.'\'';
		}

		if(isset($_POST['start_mag']) && isset($_POST['end_mag'])) 
		{
			$start_mag =(int)$_POST['start_mag'];
			$end_mag =(int)$_POST['end_mag']; 
			if($start_mag >= 1 && $end_mag>=$start_mag)
			{	
				$request = $request.' AND mg>='.$start_mag.' AND mg <='.$end_mag;
			}
		}
	}
}

$request=$request." ORDER BY date DESC";
//echo $request;
$reponse = $bdd->query($request);
//Creating markers 1 by 1
$firstEvent=true; 
while ($donnees = $reponse->fetch())
{
	$date = $donnees['date'];
	$lat = $donnees['lat'];
	$lon = $donnees['lon'];
	$mag = $donnees['mg'];
	if ($firstEvent)
	{
		$map->addMarkerIcon( "/wssp/images/icon_earthquake.gif", "/wssp/images/icon_earthquake.gif", 0, 0, 5, 0); 
		$info = "<b>Time: </b>".$date."<br><b>Lat/Lon: </b>".$lat."/".$lon."<br><b>Magnitude: </b>".$mag;
		$map->addMarkerByCoords( $lon, $lat , "", $info, "");
		$firstEvent = false;
	}
	else
	{
		$date1 = date_create($date);
		$interval = date_diff($date1, $nowDateTime)->format('%a');
		$taille = intval($mag);
		$couleur = "gris";
		if($interval <=31) {$couleur = "rouge";}
		elseif($interval <=365) {$couleur = "jaune";}
		else {$couleur = "bleu";}

		$map->addMarkerIcon( "/wssp/images/".$couleur.$taille.".png", "/wssp/images/".$couleur.$taille.".png", 0, 0, 5, 0); 
		$info = "<b>Time: </b>".$date."<br><b>Lat/Lon: </b>".$lat."/".$lon."<br><b>Magnitude: </b>".$mag;
		$map->addMarkerByCoords( $lon, $lat , "", $info, "");
	}
}

$reponse->closeCursor();
?>
	 <?php $map->printHeaderJS(); ?>
	  <?php $map->printMapJS(); ?>
	<div class="row">
		<br>
		<div class="col-sm-2"> 
			<div class="well">
		<form action="recent.php" method="post">
			<div class="form-group">
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
			 <div class="form-group">
				<legend>Date:</legend>
				<label for="start_date">- From</label>
				<input type="date" name="start_date" min="0000-00-00" value ="<?php echo $start_date ?>" class="form-control"  >
				<label for="end_date">- To</label>
				<input type="date" name="end_date" max="2100-00-00" value = "<?php echo $end_date ?>" class="form-control" ><br>
			</div>
			<input type="submit" class="btn btn-default" name="action" value="Search">
			<input type="submit" class="btn btn-default" name="action" value="Everything">
			<!--<input type="reset" class="btn btn-default"  value="Clear" />-->	
		</form>	
			</div>
 		</div>
		<div class="col-sm-6 container">
			<div class="well">
			<h4>Map of Event</h4>
				<hr>
				<?php $map->printMap(); ?>
		<br>
				<p>
				<svg version="1.1" width="19px" height="19px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#FF3737" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="2"></circle>
				</svg>
					Last Month          
				
				<svg version="1.1" width="19px" height="19px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffff00" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="2"></circle>
				</svg>
					Last Year
					
				<svg version="1.1" width="19px" height="19px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#7F7F7F" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="2"></circle>
				</svg>
					Later &nbsp &nbsp &nbsp &nbsp &nbsp     
					

					
					<svg version="1.1" width="11px" height="11px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					
					<svg version="1.1" width="13px" height="12px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					<svg version="1.1" width="14px" height="14px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					<svg version="1.1" width="17px" height="16px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					<svg version="1.1" width="19px" height="18px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					<svg version="1.1" width="21px" height="20px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
					
					<svg version="1.1" width="23px" height="22px" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
					<circle cx="50%" cy="50%" r="40%" fill="#ffffff" stroke="#595959" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" stroke-width="1"></circle>
				</svg>
				Size from 1 to 7
				</p>
			</div>
 		</div>
		<div class="col-sm-4 container">
			<div class="well">
				<h4>Table of Event</h4>
				<hr>
			</div>
 		</div>
	</div>
   
		
		
		


