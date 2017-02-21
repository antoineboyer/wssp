<?php
$request = 'SELECT * FROM events';

if($_POST['action']=='Search')
{
	if(isset($_POST['start_date']) && isset($_POST['end_date']))
	{
		$start =$_POST['start_date'];
		$end =$_POST['end_date'];
		// Une idée simple de comparaison des dates...
		/*
		$start = new DateTime($start); $start = $start->format('Ymd'); $end =$_POST['end_date'];$end = new DateTime($end);$end = $end->format('Ymd'); $diff = $end - $start*/
		$request=$request.' WHERE date BETWEEN \''.$start.'\' AND \''.$end.'\'';
	}


	if(isset($_POST['start_mag']) && isset($_POST['end_mag'])) 
	{
		$start_mag =(int)$_POST['start_mag'];
		$end_mag =(int)$_POST['end_mag']; 
		if($start_mag > 1 && $end_mag>=$start_mag)
		{	
			$request = $request.' AND mg>='.$start_mag.' AND mg <='.$end_mag;
		}
	}
}
echo $request;
echo "<br>";

?>