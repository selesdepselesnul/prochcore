<?php
require_once '../config.php';
require_once '../function.php';
?>
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
	<?php if(is_login()) :?>
		<ul class="nav nav-pills">
			<li  <?php generate_active_class('content')?>>
				<a
				href="<?php echo $config['base_url'].'admin/content.php'?>"
				id="aboutMenu" class="menu">Content</a>
			</li>
			<li <?php generate_active_class('profile')?>>
				<a
				href="<?php echo $config['base_url'].'admin/profile.php'?>"
				id="contactMenu" class="menu">Profile</a>
			</li>
	        <li <?php generate_active_class('inbox')?>>
		        <a
		        href="<?php echo $config['base_url'].'admin/inbox.php?page=1'?>"
		        id="contactMenu" class="menu">Inbox</a>
			</li>
	        <li>
		        <a
		        href="<?php echo $config['base_url'].'admin/logout.php'?>"
		        id="contactMenu" class="menu">Logout</a>
			</li>
		</ul>
	<?php endif ?>
</div>
<div class="container">
