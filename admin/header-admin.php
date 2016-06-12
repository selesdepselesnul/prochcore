<?php require_once '../config.php'; ?>
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
	<a href="<?php echo $config['base_url'] ?>">
		<img src="<?php echo $config['base_url'].'images/logo.png'?>"
	 	 id="indonistanLogo"/>
	</a>
	<h2 id="indonistanName">Indonistan Nuke Inc</h2>
	<ul>
		<li class="menu-list" style="display: inline-block;">
		<a
		href="<?php echo $config['base_url'].'admin/content.php'?>"
		id="aboutMenu" class="menu">Content</a></li>
		<li class="menu-list" style="display: inline-block;">
		<a
		href="<?php echo $config['base_url'].'admin/profile.php'?>"
		id="contactMenu" class="menu">Profile</a></li>
        <li class="menu-list" style="display: inline-block;">
        <a
        href="<?php echo $config['base_url'].'admin/inbox.php?page=1'?>"
        id="contactMenu" class="menu">Inbox</a></li>
        <li class="menu-list" style="display: inline-block;">
        <a
        href="<?php echo $config['base_url'].'admin/logout.php'?>"
        id="contactMenu" class="menu">Logout</a></li>
	</ul>
</div>
<div class="container">
