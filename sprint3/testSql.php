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
	echo $donnees['date'] . '<br />';
}

$reponse->closeCursor();
									
?>