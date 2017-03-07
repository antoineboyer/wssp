<?php
//Send an expetion if empty box
function exception1($param, $text)
{
	if (empty($param))
		{
			throw new Exception('<p>Please, fill the <mark>'.$text.'</mark> box</p>');
		}
}

function confirm($table)
{
	//Page => Nothing
	if(!isset($_POST['submit']))
	{
		if(isset($_POST['confirm']))
		{
			
			$datetime = $_POST['date1']." ".$_POST['time1'].":00";
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
			'mg' => $_POST['mg1'],
			'typemg' => $_POST['typemg1'],
			'depth' => $_POST['depth1'],
			'lat' => $_POST['lat1'],
			'lon' => $_POST['lon1'],
			'region' => $_POST['region1'],
			'manauto' => ''
			));
			
			//$request='INSERT INTO events (date,mg,typemg,depth,lat,lon,region,manauto) VALUES (\''.$datetime.'\',\''.$_POST['mg1'].'\',\''.$_POST['typemg1'].'\',\''.$_POST['lat1'].'\',\''.$_POST['lon1'].'\',\''.$_POST['depth1'].'\',\''.$_POST['region1'].'\',\'\')';
			//$bdd->exec($request);
			
			//echo $request;
			echo '<h3>Well done, you just add this event</h3>';
			echo '<hr>';
			echo '<h4> <abbr>DateTime</abbr> : '.$datetime.' </h4>';
			echo '<h4> Magnitude :'.$_POST['mg1'].' </h4>';
			echo '<h4> Type of Magnitude :'.$_POST['typemg1'].' </h4>';
			echo '<h4> Latitude :'.$_POST['lat1'].' </h4>';
			echo '<h4> Longitude :'.$_POST['lon1'].' </h4>';
			echo '<h4> Depth :'.$_POST['depth1'].' </h4>';
			echo '<h4> Region :'.$_POST['region1'].' </h4>';
			 
		}
		// Faire une page avec nothing
		echo '<h3>Waiting for a new Event :) </h3>';
	  
	}
	
	else
	{
		//Page => Error
		foreach ($table as $param)
		{
			exception1($param[0],$param[1]);
		}
		//Vérifier pour la date ??? 
		// Page => Add to the Data Base
		
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
			echo "<input type=\"hidden\" name=\"".$cle."1\" value=\"".htmlspecialchars($param[0])."\">";
      echo "</tr>";
		}              
    echo "</tbody>";
    echo "</table>";
		echo "</div>";
		
		
  	echo"	<div class=\"col-md-4\">
							<input type=\"submit\" class=\"btn btn-success\" name=\"confirm\" value=\"Confirm\">
							<input type=\"submit\" class=\"btn btn-danger\" name=\"cancel\" value=\"Cancel\">
				</div>";
		
		echo "</form>";
	}

	
}


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