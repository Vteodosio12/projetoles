<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Painel Administrativo</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
   
	<script>
		<?php 
			echo file_get_contents("/styles/css/demo.css");
			echo file_get_contents("https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css");
			echo file_get_contents("https://fonts.googleapis.com/css?family=Roboto:400,700,300");
			echo file_get_contents("/styles/css/pe-icon-7-stroke.css");
			echo file_get_contents("/styles/css/dncalendar-skin.css");
			echo file_get_contents("/styles/css/sumoselect.css");
			echo file_get_contents("https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css");
		?>
	</script>
</head>
<body ng-app="App">