CREATE DATABASE IF NOT EXISTS uas;
USE uas;

DROP TABLE IF EXISTS Inbox;
CREATE TABLE Inbox (
	id BIGINT PRIMARY KEY AUTO_INCREMENT,
	message_time TIMESTAMP,
	name TEXT,
	email TEXT,
	subject TEXT,
	content TEXT,
	is_read BOOLEAN DEFAULT false
);

INSERT INTO Inbox (name, email, subject, content)
VALUES ('suparno', 'suparno@cucok.com', 'mantab', 'mantab is the best');

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
	id TINYINT PRIMARY KEY,
	username TEXT,
	password TEXT,
	email TEXT,
	fullname TEXT,
	avatar TEXT
);

INSERT INTO Admin
VALUES (
	1,
	'root',
	'indonesiaraya',
	'root@example.com',
	'Example',
	'psych-great.jpg');

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
	 are you ready for NUKE ?
	 <b>URA URA URA !!!</b>'
);


DROP TABLE IF EXISTS Contact;
CREATE TABLE Contact (
	id TINYINT PRIMARY KEY,
	header TEXT,
	address_header TEXT,
	company_name TEXT,
	address_content TEXT,
	telp_number TEXT,
	form_header TEXT,
	admin_email_header TEXT
);


INSERT INTO Contact
VALUES (
	1,
	'How To Contact Us ?',
	'You can directly visit our office at',
	'Indonistan Nuke Inc',
	'Sehat Bahagia Street No. 100
	Jelekong, Baleendah, Bandung 40375 West Java
	Indonesia',
	'(022) 7562345',
	'Or contact us from this site, by filling this form',
	'Or send email to the personal email of admin'
);
