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
$map->setZoomLevel (7);

//(4-1) Possibilité d'affichage de l'échelle
$map->enableScaleControl();  

// Afficher un pointeur avec les coordonnées géographiques
$map->disableDirections();
$map->addMarkerIcon( "/wssp/images/rouge3.png", "/wssp/images/armenia_logo.gif", 0, 0, 0, 0); 
$map->addMarkerByCoords( (45.08), (40.22) , "<p>hello</p>", "<em>2015-04-06</em> ", "Armenia"); 

//$map->addMarkerIcon( "/wssp/images/tum.png", "/wssp/images/tum.png", 0, 0, 0, 0); 
$map->addMarkerByCoords( (40.08), (40.22) , "<p>hello</p>", "<em>2015-04-06</em> ", "Armenia"); 


//(10) On applique la base XHTML avec les fonctions à appliquer ainsi que le onload du body.
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
