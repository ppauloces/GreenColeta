<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	<link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH_FULL . "assets/css/style.css" ?>">
	<title><?= $fullTitle ?></title>
</head>
<body>
	<!-- Dropdown Structure -->
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="#!" class="green-text"><i class="material-icons left">person</i>Perfil</a></li>
		<li><a href="#!" class="red-text"><i class="red-text material-icons left">logout</i>Sair</a></li>
	</ul>
	<nav>
		<div class="nav-wrapper green darken-1 p1-left">
			<a href="#" class="brand-logo">GreenColeta</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down p1-right">
				<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Olá $nome!<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="#!" class="green-text"><i class="material-icons left">person</i>Perfil</a></li>
				<li><a href="#!" class="red-text"><i class="red-text material-icons left">logout</i>Sair</a></li>
			</ul>
		</div>
	</nav>