DROP DATABASE IF EXISTS `pocmis_db`;
CREATE DATABASE `pocmis_db`;

USE `pocmis_db`;

DROP TABLE IF EXISTS `tbl_stations`;
CREATE TABLE `tbl_stations`(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	code VARCHAR(20) NOT NULL,
	name VARCHAR(100) NOT NULL,
	region VARCHAR(100) NOT NULL,
	district VARCHAR(100)NOT NULL,
	ward VARCHAR(100) NOT NULL
)AUTO_INCREMENT=1000;

INSERT INTO `tbl_stations`(code, name, region, district, ward)
VALUES
('PO-F034-300800DAR','Staki Shari', 'Dar es salaam', 'Kinondoni', 'Mkwajuni'),
('PO-F345-400800MAN','Bagara', 'Manyara', 'Babati', 'Bagara'),
('PO-F786-500800ARU','Mto wa Mbu', 'Arusha', 'Monduli', 'Barabarani'),
('PO-F286-600800MAR','Lorya', 'Mara', 'Lorya', 'Lorya Mjini'),
('PO-F486-500800KIL','Rombo Mkuu', 'Kilimanjaro', 'Rombo', 'Mamsera');

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	stationId INT(11)NOT NULL,
	firstname VARCHAR(100) NOT NULL,
	lastname VARCHAR(100) NOT NULL,
	gender VARCHAR(10)NOT NULL,
	mobile VARCHAR(12)NOT NULL,
	email VARCHAR(12)NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(62) NOT NULL,
	role VARCHAR(20) NOT NULL default 'admin',
	createdAt INT(11) default 0
)AUTO_INCREMENT=100200;

INSERT INTO `tbl_users`(stationId,firstname, lastname, gender, mobile, email, username, password, role, createdAt) 
VALUES
(1000,'Yusuph','Kajabukama','Male','0714454282','kajabukama@tamisemi.go.tz','kajabukama',md5('admin'), 'admin',125637377),
(1000,'Victoria', 'Mwampishi','Female','0784494280','mwampashi@gmail.com','mwampashi',md5('user'), 'user',3475342119),
(1000,'Joseph','Kimaro','Male','07544542110','kimaro@gmail.com','jose.kimaro',md5('guest'), 'guest',18373736622);

DROP TABLE IF EXISTS `tbl_crimes`;
CREATE TABLE `tbl_crimes`(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	userId INT(11) NOT NULL,
	stationId INT(11) NOT NULL,
	firstname VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	gender VARCHAR(10) NOT NULL
) AUTO_INCREMENT=200300;