<?php
	require_once 'header.php';
	require_once 'tags.php';
?>
	<div class="home" id="home" class="main">
			<h1><?php echo $content['home']['header'] ?></h1> <br />
			<?php echo $content['home']['content'] ?>
			<!-- <?php echo htmlspecialchars_decode($content['home']['image']) ?> -->
			<?php var_dump($content['homeweapon'])?>
	</div>

	<div id="about" class="main">
		<h1><?php echo $content['about']['header'] ?></h1>
		<?php echo $content['about']['content'] ?>
	</div>

	<div id="contact" class="main">
		<h1><?php echo $content['contact']['header'] ?></h1>
		<br/>
		<br/>
		<address>
			<h2><?php echo $content['contact']['address_header'] ?></h2><br/>
			<?php echo $content['contact']['address_content'] ?>
		</address>
		<div id="socialMedia">
			<h2><?php echo $content['contact']['social_media_header'] ?></h2> <br />
			<?php echo $content['contact']['social_media_content'] ?>
		</div>

		<form method="POST" action="" id="contactForm">
			<h2><?php echo $content['contact']['form_header'] ?></h2><br/>
			<label for="name">Name</label><br/>
			<input type="text" name="name" class="input" /> <br/>
			<label for="email">E-Mail</label><br/>
			<input type="email" name="email" class="input" /> <br/>
			<label for="content">Content</label> <br/>
			<textarea name="content" class="input"></textarea><br/>
			<input type="submit" class="button"><br/>
		</form>
	</div>
	<br/>

<script src="index.js">
</script>

<?php
require_once 'footer.php';
?>
