<!DOCTYPE HTML>
<html>
<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" />
    <link rel="stylesheet" href="/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/css/medicPanel.css">
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="/styles/js/uploader/jquery.liteuploader.min.js"></script>
	
		<link rel="stylesheet" href="/styles/ScEditor/minified/themes/default.min.css" type="text/css" media="all" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="/styles/ScEditor/minified/jquery.sceditor.xhtml.min.js"></script>

		<script>
			// Source: https://www.backalleycoder.com/2011/03/20/link-tag-css-stylesheet-load-event/
			var loadCSS = function(url, callback){
				var link = document.createElement('link');
				link.type = 'text/css';
				link.rel = 'stylesheet';
				link.href = url;
				link.id = 1;

				document.getElementsByTagName('head')[0].appendChild(link);

				var img = document.createElement('img');
				img.onerror = function(){
					if(callback) callback(link);
				}
				img.src = url;
			}

			$(document).ready(function() {
				var initEditor = function() {
					$("textarea").sceditor({
						plugins: 'bbcode',
						style: "/styles/ScEditor/minified/jquery.sceditor.default.min.css"
					});
				};

				initEditor();
			});
		</script>
</head>
<body ng-app="AngioApp"> 