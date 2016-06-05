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
	home_image TEXT,
	about_header TEXT,
	about TEXT,
	contact_header TEXT,
	contact_address TEXT,
	contact_social_media TEXT
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
	'',
	'Who we are ?',
	'We are Nuclear weapon company from Indonesia,
	 we are disribute nuclear and its vehicle all of them are made in Russia,
	 but lately we also build our own nuclear and its vehicle.
	 Quality is our priority, we are experienced company,
	 we do our bussiness since soviet union era.
	 We work with passion and love, we believe peace is better
	 but peace can be reached with war, so deal with it :)
	 are you ready for NUKE ?
	 URA URA URA !!!');


















'

);
