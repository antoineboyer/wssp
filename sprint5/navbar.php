<?php
function navbar($currentLink){
	$about="";
	$historical="";
	$recent="";
	$contact="";
	$add="";
	if($currentLink=='about')
	{
		$about="class=\"active\"";
	}
	else if ($currentLink=='historical')
	{
		$historical="class=\"active\"";
	}
	else if ($currentLink=='recent')
	{
		$recent="class=\"active\"";
	}
	else if ($currentLink=='contact')
	{
		$contact="class=\"active\"";
	}
		else if ($currentLink=='add')
	{
		$add="class=\"active\"";
	}
	$html =' 
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-1">
						<!--<img src="/wssp/images/armenia_logo.gif" class="img-circle" alt="armenian logo">-->
					</div>
					<div class="col-md-11">
						<body id="title">
							<h1>WESTERN SURVEY FOR SEISMIC PROTECTION</h1>
						</body>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-1 col-md-11">
						<ul class="nav navbar-nav">';

	$html .='<li '.$about.'><a href="/wssp/sprint5/about/about.php">About Us</a></li>';
	$html .='<li '.$historical.'><a href="/wssp/sprint5/historical/historical.php">Historical Events</a></li>';
	$html .='<li '.$recent.'><a href="/wssp/sprint5/recent/recent.php">Recent Events</a></li>';
	$html .='<li '.$add.'><a href="/wssp/sprint5/add/add.php">Add Events</a></li>';
	$html .='<li '.$contact.'><a href="/wssp/sprint5/contact/contact.php">Contact</a></li>';


	$html .='  </ul>
					</div>
				</div>
			</div>';
	echo $html;
	}
?>