<?php
	require_once 'header.php';
	require_once 'function.php';

	$admin = read_row_by_id('Admin', 1);
	$home = read_row_by_id('Home', 1);
	$about = read_row_by_id('About', 1);
	$contact = read_row_by_id('Contact', 1);
	$home_weapons = read_rows('HomeWeapon');
	$is_sending_success = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(!empty($_POST['name'])
			&& !empty($_POST['email'])
			&& !empty($_POST['subject'])
			&& !empty($_POST['content'])) {
			add_row('Inbox', [
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'subject' => $_POST['subject'],
				'content' => $_POST['content']
			]);
			$is_sending_success = 'success';
		} else {
			$is_sending_success = 'unsuccessful';
		}
		redirect_to($config['base_url'].'#contact');
	}

	?>
	<div class="home row  upper-row" id="home" class="main">
			<h1><?php echo $home['header'] ?></h1>
			<p>
				<?php echo nl2br($home['content']) ?>
			</p>
			<div class="row">
				<?php foreach ($home_weapons as $home_weapon): ?>
					<div class="img">
	   			 		<img src="<?php echo $home_weapon['image_path']?>" class="img">
						<a target="_blank" href="<?php echo $home_weapon['image_path']?>">
	   			 		</a>
	   			 		<div class="desc"><?php echo nl2br($home_weapon['description']) ?></div>
	   			 	</div>
				<?php endforeach ?>
			</div>
	</div>

	<div id="about" class="main row">
		<h1><?php echo $about['header'] ?></h1>
		<p>
			<?php echo nl2br($about['content']) ?>
		</p>
	</div>

	<div id="contact" class="main row">
		<h1 class="row"><?php echo $contact['header'] ?></h1>

		<address>
			<h2><?php echo $contact['address_header'] ?></h2><br/>
			<strong><h4><?php echo $contact['company_name'] ?></h4></strong> <br/>
			<?php echo nl2br($contact['address_content']) ?> <br/>
			<p>
				<img src="images/telp-icon.png" width="20" height="20"/>
				<?php echo $contact['telp_number'] ?>
			</p>
		</address>

		<form method="POST" action="" id="contactForm">
			<h2><?php echo $contact['form_header'] ?></h2><br/>
			<?php if(!empty($is_sending_success)): ?>
				<?php if($is_sending_success == 'success'): ?>
					<label class="label label-success">Terima kasih, pesan sukses dikirim ke pihak <?php echo $contact['company_name'] ?></label>
				<?php else: ?>
					<label class="label label-danger">Gagal dikirim, harap semua input dilengkapi !</label>
				<?php endif ?>
			<?php endif ?>
			<br />
			<label for="name">Name</label><br/>
			<input type="text" name="name" class="input" /> <br/>
			<label for="email">E-Mail</label><br/>
			<input type="email" name="email" class="input" /> <br/>
			<label for="subject">Subject</label><br/>
			<input type="text" name="subject" class="input" /> <br/>
			<label for="content">Content</label> <br/>
			<textarea name="content" class="input"></textarea><br/>
			<input type="submit" class="button"><br/>
		</form>


	</div>

	<div  class="main row lower-container">
		<h1><?php echo $contact['admin_email_header'] ?></h1>
		<p>
			<img src="images/email-logo.png" width="20" height="20"/>
			<a href="mailto:<?php echo $admin['email'] ?>?Subject=indonistan" target="_top">
				<?php echo $admin['email'] ?>
			</a>
		</p>
	</div>


<script src="index.js">
</script>

<?php require_once 'footer.php'; ?>
