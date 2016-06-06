CREATE DATABASE IF NOT EXISTS uas;

USE uas;

DROP TABLE IF EXISTS Message;
CREATE TABLE Message (
	id BIGINT PRIMARY KEY AUTO_INCREMENT,
	name TEXT,
	email TEXT,
	content TEXT
);

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
	id TINYINT PRIMARY KEY,
	username TEXT,
	password TEXT,
	email TEXT,
	fullname TEXT
);

INSERT INTO Admin
VALUES (
	1,
	'root',
	'indonesiaraya',
	'mantab@gmail.com',
	'Saturno Atmaji');

DROP TABLE IF EXISTS Content;
CREATE TABLE Content (
	id TINYINT PRIMARY KEY,
	home_header TEXT,
	home_content TEXT,
	home_image LONGTEXT,
	about_header TEXT,
	about_content TEXT,
	contact_header TEXT,
	contact_address TEXT,
	contact_social_media LONGTEXT
);

INSERT INTO Content
VALUES (
	1,
	'Our Nuke',
	'Our nuclear product considered the best nuclear variant,
	we use the best nuclear product made in Russian Federation,
	Here are just some list of our best nuclear weapon,
	also in the last list you can check our first ever made nuclear weapon,
	Made in Indonesia nuclear !',
	'<div class="img">
			<a target="_blank" href="images/topol-m.jpg">
		<img src="images/topol-m.jpg" class="img">
			</a>
			<div class="desc">RT-2PM2 Topol-M TEL with presumably Yars system
transport-launch container during the first rehearsal for the Victory Day Parade at the training ground in Alabino.</div>
	</div>
	<div class="img">
			<a target="_blank" href="images/rs-24.jpg">
		<img src="images/rs-24.jpg" class="img">
			</a>
			<div class="desc">The RS-24 Yars also known as RT-24 Yars or
Topol-MR (Russian: PC-24 «Ярс», NATO reporting name: SS-27 Mod 2)</div>
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
	</div>',
	'Who we are ?',
	'We are Nuclear weapon company from Indonesia,
	 we are disribute nuclear and its vehicle all of them are made in Russia,
	 but lately we also build our own nuclear and its vehicle.
	 Quality is our priority, we are experienced company,
	 we do our bussiness since soviet union era.
	 We work with passion and love, we believe peace is better
	 but peace can be reached with war, so deal with it
	 are you ready for NUKE ?
	 <b>URA URA URA !!!</b>',
	 'How To Contact Us ?',
	 'Indonistan Nuke Inc
	  Sehat Bahagia Street No. 100
	  Jelekong, Baleendah, Bandung 40375 West Java
	  Indonesia',
	  '<h2>Or contact us on social media and e-mail at</h2>
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
	   target="_top">indonistanofficial@mail.ru</a> <br/>');
