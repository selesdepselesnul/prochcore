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
	id TINYINT PRIMARY KEY AUTO_INCREMENT, 
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