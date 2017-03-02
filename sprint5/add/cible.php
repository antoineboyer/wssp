<?php
function exception1($param, $text)
{
	if (empty($param))
		{
			throw new Exception('Please, fill the '.$text.' form');
		}
}

function confirm($date, $time)
{
	if(!isset($_POST['submit']))
	{
		// Faire une page avec nothing
		echo 'Nothing';
	}
	else
	{
		exception1($date,'date');
		
		if (substr($time, 3)>60)
		{
			throw new Exception('Minutes less than 60');
		}
	}
}


try
{
	confirm($date, $time);
}
catch(Exception $e) 
{
	echo 'There is an error :  ', $e->getMessage();
}

?>