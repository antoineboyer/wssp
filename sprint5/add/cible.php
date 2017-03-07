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
		// Faire une page avec nothing
		echo '<h3>Waiting for a new Event :) </h3>';
	  echo '<hr>';
	}
	//Page => Error
	else if
	{
		foreach ($table as $param)
		{
			exception1($param[0],$param[1]);
		}
	}
	// Adding to the Data BaseS
	else
	{
		
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