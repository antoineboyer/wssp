<?php
date_default_timezone_set('Europe/London');

$date0 = date_create(date('Y-m-d H:i:s', time()));

$date1 = date_create('2009-10-13 05:05:05');
$date2 = date_create('2009-10-11 05:05:05');

$interval = date_diff($date0, $date2)->format('%a');
//echo $interval;
$nowDate = date('Y-m-d', time());
echo $nowDate;
?>