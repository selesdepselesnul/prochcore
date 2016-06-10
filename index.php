<?php
	require_once 'header.php';
	require_once 'function.php';

	if(!empty($_POST['name'])
		&& !empty($_POST['email'])
		&& !empty($_POST['content']))
		write_table('Inbox', [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'content' => $_POST['content']
		]);
		$home = read_table_by_id('Home', 1);
		$about = read_table_by_id('About', 1);
		$contact = read_table_by_id('Contact', 1);
		$homeweapon = read_table('HomeWeapon');
?>
	<div class="home" id="home" class="main">
			<h1><?php echo $home['header'] ?></h1> <br />
			<?php echo $home['content'] ?>
			<?php foreach ($homeweapon as $home_weapon): ?>
				<div class="img">
   			 		<img src="<?php echo $home_weapon['image_path']?>" class="img">
					<a target="_blank" href="<?php echo $home_weapon['image_path']?>">
   			 		</a>
   			 		<div class="desc"><?php echo $home_weapon['description']?></div>
   			 	</div>
			<?php endforeach; ?>
	</div>

	<div id="about" class="main">
		<h1><?php echo $about['header'] ?></h1>
		<?php echo $about['content'] ?>
	</div>

	<div id="contact" class="main">
		<h1><?php echo $contact['header'] ?></h1>
		<br/>
		<br/>
		<address>
			<h2><?php echo $contact['address_header'] ?></h2><br/>
			<?php echo $contact['address_content'] ?>
		</address>
		<div id="socialMedia">
			<h2><?php echo $contact['social_media_header'] ?></h2> <br />
			<?php echo $contact['social_media_content'] ?>
		</div>

		<form method="POST" action="" id="contactForm">
			<h2><?php echo $contact['form_header'] ?></h2><br/>
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
