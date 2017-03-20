<?php
//SEND AN EXCEPTION IF A BOX IS EMPTY
function exception1($param, $text)
{
	if (empty($param))
		{
			throw new Exception('<p>Please, fill the <mark>'.$text.'</mark> box</p>');
		}
}
// FUNCTION WHICH DISPLAY THE RIGHT COLUMN
function confirm($table)
{
	// IF NO EVENT SUBMITED
	if(!isset($_POST['submit']))
	{
		//IF AN EVENT WAS ADDED BEFORE
		if(isset($_POST['confirm']))
		{
			
			$datetime = $_POST['date']." ".$_POST['time'].":00";
			echo $datetime;
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=wssp;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
        die('Erreur : '.$e->getMessage());
			}
			
			$req = $bdd->prepare('INSERT INTO events (date,mg,typemg,depth,lat,lon,region,manauto) VALUES(:date, :mg, :typemg, :depth, :lat, :lon, :region, :manauto)');
			
			$req->execute(array(
			'date' => $datetime,
			'mg' => $_POST['mg'],
			'typemg' => $_POST['typemg'],
			'depth' => $_POST['depth'],
			'lat' => $_POST['lat'],
			'lon' => $_POST['lon'],
			'region' => $_POST['region'],
			'manauto' => ''
			));
			
			echo '<h3>Well done, you just add this event</h3>';
			echo '<hr>';
			echo '<h4> <abbr>DateTime</abbr> : '.$datetime.' </h4>';
			echo '<h4> Magnitude :'.$_POST['mg'].' </h4>';
			echo '<h4> Type of Magnitude :'.$_POST['typemg'].' </h4>';
			echo '<h4> Latitude :'.$_POST['lat'].' </h4>';
			echo '<h4> Longitude :'.$_POST['lon'].' </h4>';
			echo '<h4> Depth :'.$_POST['depth'].' </h4>';
			echo '<h4> Region :'.$_POST['region'].' </h4>';
			 
		}
		echo '<h3>Waiting for a new Event :) </h3>';
	  
	}
	
		//IF EVENT SUBMITED
	else
	{
		// SEE IF THERE IS AN EXCEPTION (SEE FUNCTION EXCEPTION1 ABOVE)
		foreach ($table as $param)
		{
			exception1($param[0],$param[1]);
		}
		//IF NO EXCEPTION, PROPOSE TO ADD THE EVENT
		
		echo '<h3>Confirm the Event </h3>';
	  echo '<hr>';
		echo "<form action=\"add.php\" class=\"well form-horizontal\" method=\"post\">";
		
		echo "<div class=\"form-group\">";
		echo "<table class=\"table table-user-information\">";
    echo "<tbody>";
		foreach ($table as $cle => $param)
		{
			echo "<tr>";
      echo "<td>";
			echo	htmlspecialchars($param[1]);
			echo "</td>";
      echo "<td>";
			echo	htmlspecialchars($param[0]);
			echo "</td>";
			echo "<input type=\"hidden\" name=\"".$cle."\" value=\"".htmlspecialchars($param[0])."\">";
      echo "</tr>";
		}              
    echo "</tbody>";
    echo "</table>";
		  	echo"	<div class=\"col-md-4\">
							<input type=\"submit\" class=\"btn btn-success\" name=\"confirm\" value=\"Confirm\">
							<input type=\"submit\" class=\"btn btn-danger\" name=\"cancel\" value=\"Cancel\">
							</div>";
		echo "</div>";
		
		

		
		echo "</form>";
	}

	
}

// FUNCTION CONFIRM (SEE ABOVE) WITH TABLE $TABLE
try
{
	confirm($table);
}
catch(Exception $e) 
{
	echo '<h3>Error</h3>';
	echo '<hr>';
	echo  $e->getMessage();
}

?>