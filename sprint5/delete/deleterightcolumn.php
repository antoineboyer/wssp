<?php

	// IF NO EVENT SUBMITED
	if(!isset($_POST['search']))
	{
		//IF EVENTS WERE DELETED BEFORE
		if(isset($_POST['delete']))
		{
		// SHOW EVENT WHICH WERE DELETED
			echo '<h3>Events Deleted </h3>';
			echo '<ul class=\'list-group\'>';
			$todelete = array();
			$numberOfEvent = $_POST['numberOfEvent'];
			for ($i = 1; $i <= $numberOfEvent; $i++) 
			{
				if(isset($_POST[$i]))
				{
					echo '<li class=\'list-group-item\'>'.$_POST[$i].'</li>';
					array_push($todelete, $_POST[$i]);
				}
			}
			echo '</ul>';
			
			if (empty($todelete))
			{
				echo 'No data to delete !!! ';
			}
			else
			{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=wssp;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				
				$req = 'DELETE FROM events WHERE date IN (';
				foreach($todelete as $date)
				{
					$req= $req.'\''.$date.'\''.',';
				}
				$req = substr($req,0,-1).')';
				$bdd->exec($req);
			}
			echo '<h4>Waiting to delete some Events :) </h4>';
		}
		else
		{
		echo '<h3>Waiting to delete some Events  </h3>';
		
	  echo '<hr>';
		}
	
	}
	
		//IF EVENT SUBMITED
	else
	{
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

		if(isset($_POST['start_date']) && isset($_POST['end_date']))
		{
			$start_date =$_POST['start_date'];
			$end_date =$_POST['end_date'];
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
	
		$request=$request." ORDER BY date"; // LIMIT 0,8
		//echo $request;
		$reponse = $bdd->query($request);
		
		echo '<h3>Choose events to delete </h3>';
		//echo '<p>This table will just display the 8 firsts events (order by date)</p>';
	  echo '<hr>';
		echo '<form action=\'delete.php\' class=\'well form-horitzontal\' method=\'post\'>';
		echo '<div class=\'form-group\'>';	
		// HIDDEN INPUT TO KEEP VALUES OF MG AND DATE CHOSENS
		echo '<input type=\'hidden\' name=\'start_mag\' value=\''.htmlspecialchars($_POST['start_mag']).'\'>';
		echo '<input type=\'hidden\' name=\'end_mag\' value=\''.htmlspecialchars($_POST['end_mag']).'\'>';
		echo '<input type=\'hidden\' name=\'start_date\' value=\''.htmlspecialchars($_POST['start_date']).'\'>';
		echo '<input type=\'hidden\' name=\'end_date\' value=\''.htmlspecialchars($_POST['end_date']).'\'>';
		
		echo'<table class = \'table table-bordered\'>
				<thead>
					<tr>
						<th class=\'col-md-4\'>TIME (UTC)</th>
						<th class=\'col-md-1\'>M</th>
						<th class=\'col-md-2\'>LAT/LONG</th>
						<th class=\'col-md-3\'>REGION</th>
						<th class=\'col-md-1\'>DELETE</th>
					</tr>
				</thead>
				<tbody>';
		$i=0;
		while ($donnees = $reponse->fetch())
		{
			$i = $i+1;
			echo '<tr>';
			echo '<td class=\'col-md-4\'>' . $donnees['date'] . '</td>';
			echo '<td class=\'col-md-1\'>' . $donnees['mg'] . '</td>';
			echo '<td class=\'col-md-2\'>' . $donnees['lat'] .' / ' .$donnees['lon'] . '</td>';
			echo '<td class=\'col-md-3\'>' . $donnees['region'] . '</td>';
			echo '<td class=\'col-md-1\'><input type=\'checkbox\' name=\''.$i.'\' value=\''.$donnees['date'].'\'> </td>';
			echo '</tr>';
		}
		//Hidden value to get the number of event
		echo '<input type=\'hidden\' name=\'numberOfEvent\' value=\''.$i.'\'>';
		echo '</tbody>';
  	echo '</table>';
		echo"	<div class=\"col-md-4\">
					<input type=\"submit\" class=\"btn btn-success\" name=\"delete\" value=\"Delete\">
					<input type=\"submit\" class=\"btn btn-danger\" name=\"cancel\" value=\"Cancel\">
					</div>";
		echo '</div>';
		echo '</form>';
		$reponse->closeCursor();

	}

?>