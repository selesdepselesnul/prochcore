CREATE DATABASE IF NOT EXISTS uas;

USE uas;

DROP TABLE IF EXISTS Inbox;
CREATE TABLE Inbox (
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

DROP TABLE IF EXISTS Home;
CREATE TABLE Home (
	id TINYINT PRIMARY KEY,
	header TEXT,
	content TEXT
);


INSERT INTO Home
VALUES (
	1,
	'Our Nuke',
	'Our nuclear product considered the best nuclear variant,
	we use the best nuclear product made in Russian Federation,
	Here are just some list of our best nuclear weapon,
	also in the last list you can check our first ever made nuclear weapon,
	Made in Indonesia nuclear !'
);

-- '<div class="img">
-- 	<a target="_blank" href="images/topol-m.jpg">
-- 		<img src="images/topol-m.jpg" class="img">
-- 	</a>
-- 	<div class="desc">RT-2PM2 Topol-M TEL with presumably Yars system
-- 		transport-launch container during the first rehearsal for the Victory
-- 		Day Parade at the training ground in Alabino.
-- 	</div>
-- </div>
-- <div class="img">
-- 	<a target="_blank" href="images/rs-24.jpg">
-- 		<img src="images/rs-24.jpg" class="img">
-- 	</a>
-- 	<div class="desc">The RS-24 Yars also known as RT-24 Yars or
-- 		Topol-MR (Russian: PC-24 «Ярс», NATO reporting name: SS-27 Mod 2)
-- 	</div>
-- </div>
-- <div class="img">
-- 	<a target="_blank" href="images/r36-m.jpg">
-- 		<img src="images/r36-m.jpg" class="img">
-- 	</a>
-- 	<div class="desc">R-36M; NATO reporting name: SS-18 Satan.</div>
-- </div>
-- <div class="img">
-- 	<a target="_blank" href="images/bom-gas.jpg">
-- 		<img src="images/bom-gas.jpg" class="img">
-- 	</a>
-- 	<div class="desc">
-- 		first ever made nuclear weapon <br/>
-- 		from Our Country Indonesia, russian call it <br/>
-- 		The Migthy Green and NATO call it The Kitchen SWAGGER,
-- 		it has official name gas nuclear.
-- 	</div>
-- </div>'



DROP TABLE IF EXISTS HomeWeapon;
CREATE TABLE HomeWeapon (
	image_path TEXT,
	description TEXT
);


DROP TABLE IF EXISTS About;
CREATE TABLE About (
	id TINYINT PRIMARY KEY,
	header TEXT,
	content TEXT
);

INSERT INTO About
VALUES (
	1,
	'Who we are ?',
	'We are Nuclear weapon company from Indonesia,
	 we are disribute nuclear and its vehicle all of them are made in Russia,
	 but lately we also build our own nuclear and its vehicle.
	 Quality is our priority, we are experienced company,
	 we do our bussiness since soviet union era.
	 We work with passion and love, we believe peace is better
	 but peace can be reached with war, so deal with it
	 are you ready for NUKE ?<b>URA URA URA !!!</b>'
);


DROP TABLE IF EXISTS Contact;
CREATE TABLE Contact (
	id TINYINT PRIMARY KEY,
	header TEXT,
	address_header TEXT,
	address_content TEXT,
	social_media_header TEXT,
	social_media_content LONGTEXT,
	form_header TEXT
);


INSERT INTO Contact
VALUES (
	1,
	'How To Contact Us ?',
	'You can directly visit our office at',
	'Indonistan Nuke Inc
	Sehat Bahagia Street No. 100
	Jelekong, Baleendah, Bandung 40375 West Java
	Indonesia',
	'Or contact us on social media and e-mail at',
	'<img src="images/vk.png" class="social-media" title="VKontakte">
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
	   target="_top">indonistanofficial@mail.ru</a> <br/>',
	'Or contact us from this site, by filling this form'
);
