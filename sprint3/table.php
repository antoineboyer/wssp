<h2>Armenian Seismic Events</h2>
  <p>This table shows the last armenian seismic events</p>            
  <table class="table table-striped" id="eventtable">
    <thead>
      <tr>
        <th class="col-md-2">TIME (UTC)</th>
        <th class="col-md-1">MAGNITUDE (ML)</th>
        <th class="col-md-1">LAT/LONG (DEGREE)</th>
        <th class="col-md-2">REGION</th>
      </tr>
    </thead>
    <tbody>

<?php

try
{
   // On se connecte à MySQL
   $bdd = new PDO('mysql:host=localhost;dbname=wssp;charset=utf8', 'root', '');
}

catch(Exception $e)
{
   // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM events');

while ($donnees = $reponse->fetch())
{
	echo '<tr>';
	echo '<td class="col-md-2">' . $donnees['date'] . '</td>';
	echo '<td class="col-md-1">' . $donnees['mg'] . '</td>';
	echo '<td class="col-md-1">' . $donnees['depth'] . '</td>';
	echo '<td class="col-md-1">' . $donnees['lat'] .'/' .$donnees['lon'] . '</td>';
	echo '<td class="col-md-2">' . $donnees['region'] . '</td>';
	echo '<td class="col-md-1">' . $donnees['manauto'] . '</td>';
	echo '</tr>';
}

$reponse->closeCursor();
									
?>				
    </tbody>
  </table>





