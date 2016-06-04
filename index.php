<?php 
	require_once 'header.php';

?>
	<div class="home" id="home" class="main">
			<h1>Our NUKE</h1>
			Our nuclear product considered the best nuclear variant, 
			we use the best nuclear product made in Russian Federation, 
			Here are just some list of our best nuclear weapon, also in the last list you can check our first ever made nuclear weapon, Made in Indonesia nuclear !<br/>
			<div class="img">
			  <a target="_blank" href="images/topol-m.jpg">
			    <img src="images/topol-m.jpg" class="img"> 
			  </a>
			  <div class="desc">RT-2PM2 Topol-M TEL with presumably Yars system transport-launch container during the first rehearsal for the Victory Day Parade at the training ground in Alabino.</div>
			</div>
			<div class="img">
			  <a target="_blank" href="images/rs-24.jpg">
			    <img src="images/rs-24.jpg" class="img"> 
			  </a>
			  <div class="desc">The RS-24 Yars also known as RT-24 Yars or Topol'-MR (Russian: PC-24 «Ярс», NATO reporting name: SS-27 Mod 2)</div>
			</div>
			<div class="img">
			  <a target="_blank" href="images/r36-m.jpg">
			    <img src="images/r36-m.jpg" class="img"> 
			  </a>
			  <div class="desc">R-36M; NATO reporting name: SS-18 Satan.</div>
			</div>
			
			<div class="img">
			  <a target="_blank" href="images/bom-gas.jpg">
			    <img src="images/bom-gas.jpg" class="img"> 
			  </a>
			  <div class="desc">
			 	first ever made nuclear weapon <br/> 
				from Our Country Indonesia, russian call it <br/> 
				The Migthy Green and NATO call it The Kitchen SWAGGER, it has official name gas nuclear.
			</div>
			</div>
	</div>
	<div id="about" class="main">
		<h1>Who we are ?</h1>
		We are Nuclear weapon company from Indonesia, <br/>
		we are disribute nuclear and its vehicle all of them are made in Russia, 
		but lately we also build our own nuclear and its vehicle. <br/>
		Quality is our priority, we are experienced company, we do our bussiness
		since soviet union era.<br/>
		We work with passion and love, we believe peace is better<br/>
		but peace can be reached with war, so deal with it :) <br/>
		are you ready for NUKE ? <br/>
		<b>URA URA URA !!!</b>
	</div>
	<div id="contact" class="main">
		<h1>How To Contact Us ? </h1>
		<br/>
		<br/>
		<address>
			<h2>You can directly visit our office at</h2><br/>
			Indonistan Nuke Inc<br/>
			Sehat Bahagia Street No. 100 <br/>
			Jelekong, Baleendah, Bandung 40375 West Java <br/>
			Indonesia			
		</address>
		<div id="socialMedia">
			<h2>Or contact us on social media and e-mail at</h2>
			<img src="images/vk.png" class="social-media" title="VKontakte">
			<a href="https://vk.com/indonistanofficial">
			https://vk.com/indonistanofficial</a> <br/>
			<img src="images/ok.svg" class="social-media" title="Odnoklassniki">
			<a href="https://ok.ru/indonistanofficial">
			https://ok.ru/indonistanofficial</a> <br/>
			<img src="images/rutube.png" class="social-media" title="rutube">
			<a href="https://rutube.ru/indonistanofficial">
			https://rutube.ru/indonistanofficial</a> <br/>
			<img src="images/mail.svg" class="social-media" title="mail.ru">
			<a href="mailto:indonistanofficial@mail.ru?Subject=Nuke" 
			target="_top">indonistanofficial@mail.ru</a> <br/>
		</div>

		<form method="POST" action="" id="contactForm">
			<h2>Or contact us from this site, by filling this form</h2><br/>
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
<?php	
	$mysqli = mysqli_connect(
			"127.0.0.1", 
			"root", 
			"indonesiaraya", 
			"uas");

	if(!empty($_POST['name']) 
		&& !empty($_POST['email'])
		&& !empty($_POST['content'])) {
		
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
				
		mysqli_query(
			$mysqli,
			"INSERT INTO message (name, email, content)
		 	VALUES ('$name', '$email', '$content');"
		);		
	
	}
	mysqli_close($mysqli); 
?>
<script src="index.js">
</script>
<?php
require_once 'footer.php';
?>