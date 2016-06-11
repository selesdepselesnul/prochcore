<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INDONISTAN NUKE INC</title>
	<link rel="stylesheet"
	href="<?php echo $config['base_url'].'index.css' ?>">
	<link rel="stylesheet"
	href="<?php echo $config['base_url'].'bootstrap.min.css' ?>">
</head>
<body>
<div class="header">
	<img src="<?php echo $config['base_url'].'images/logo.png'?>"
	 	 id="indonistanLogo"/>
	<h2 id="indonistanName">Indonistan Nuke Inc</h2>
	<ul>
		<li class="menu-list">
		<a
		href="<?php echo $config['base_url'].'#home'?>" id="homeMenu" class="menu">Home</a></li>
		<li class="menu-list">
		<a
		href="<?php echo $config['base_url'].'#about'?>"
		id="aboutMenu" class="menu">About</a></li>
		<li class="menu-list">
		<a
		href="<?php echo $config['base_url'].'#contact'?>"
		id="contactMenu" class="menu">Contact</a></li>
	</ul>
</div>
<div class="container">
