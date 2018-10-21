<?php

	$launchData = file_get_contents('https://launchlibrary.net/1.4/launch/next/5');
	$launchData = json_decode($launchData, true);
	$result = '<ul class="list-unstyled">';
	for ($x=0; $x<count($launchData[launches]); $x++) {
		if (count($launchData[launches][$x][rocket][imageSizes])>0) {
			$pictureLink = str_replace($launchData[launches][$x][rocket][imageSizes][count($launchData[launches][$x][rocket][imageSizes])-1],$launchData[launches][$x][rocket][imageSizes][0],$launchData[launches][$x][rocket][imageURL]);
		} else {
			$pictureLink = $launchData[launches][$x][rocket][imageURL];
		}
		$missionDate = $launchData[launches][$x][windowstart];
		$missionName = $launchData[launches][$x][name];
		$missionDescription = $launchData[launches][$x][missions][0][description];
		$result .= '<li class="media" style="padding: 20px 0px;">
						<img class="mr-3" src="'.$pictureLink.'" alt="Picture of a rocket">
						<div class="media-body">
							<h5 class="mt-0 mb-1" style="color: blue;">'.$missionDate.'</h5>
							<h5 class="mt-0 mb-1">'.$missionName.'</h5>'.$missionDescription.'
						</div>
					</li>';
	}
	$result .= '</ul>';

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Keep Flying</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
		
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<style>
		
			body {
				padding: 20px;
			}
		
		</style>
		
	</head>
	
	<body>
	
		<div class="container">
			
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
				  <a class="navbar-brand" href="#">Keep Flying</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item">
						<a class="nav-link" href="#">Next 5 Launches</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#">Filters</a>
					  </li>
					</ul>
				  </div>
			</nav>
			
			<div id="content">
				<?php
					echo $result;
				?>
			</div>
			
		</div>
			
	</body>
</html>