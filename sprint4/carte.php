<?php
//(1) On inclut la classe de Google Maps pour générer ensuite la carte.
require('/../API/GoogleMapAPI.class.php');

//(2) On crée une nouvelle carte; Ici, notre carte sera $map.
$map = new GoogleMapAPI('map');

//(3) On ajoute la clef de Google Maps.
$map->setAPIKey('AIzaSyBH03AAep0MnWcLF3PfvBnZ-cpjpFoRXLA');
    
//(4) On ajoute les caractéristiques que l'on désire à notre carte.
$map->setWidth("800px");
$map->setHeight("500px");
$map->setCenterCoords ('45', '40');
$map->setZoomLevel (8);

//(4-1) Possibilité d'affichage de l'échelle
$map->enableScaleControl();  

$map->disableDirections();
//Fait une requête SQL et créer les différents pointeurs.

//On récupère l'heure actuelle
date_default_timezone_set('Europe/London');

$now = date_create(date('Y-m-d H:i:s', time()));

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
	$date = $donnees['date'];
	$date1 = date_create($date);
	$interval = date_diff($date1, $now)->format('%a');
	$lat = $donnees['lat'];
	$lon = $donnees['lon'];
	$mag = $donnees['mg'];
	$taille = intval($mag);
	$couleur = "gris";
	if($interval <=31) {$couleur = "rouge";}
	elseif($interval <=365) {$couleur = "jaune";}
	else {$couleur = "gris";}
	
	$map->addMarkerIcon( "/wssp/images/".$couleur.$taille.".png", "/wssp/images/".$couleur.$taille.".png", 0, 0, 0, 0); 
	$info = "<b>Time: </b>".$date."<br><b>Lat/Lon: </b>".$lat."/".$lon."<br><b>Magnitude: </b>".$mag;
	$map->addMarkerByCoords( $lon, $lat , "", $info, ""); 
}

$reponse->closeCursor();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	
	<head>
		<title>Ma première carte Google Maps</title>
		<?php $map->printHeaderJS(); ?>
		<?php $map->printMapJS(); ?>
	</head>
	
	<body onload="onLoad();">
		<?php $map->printMap(); ?>
	</body>
	
</html>
