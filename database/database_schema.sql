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

DROP TABLE IF EXISTS `tbl_tribes`;
CREATE TABLE `tbl_tribes`(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	code VARCHAR(20) NOT NULL,
	name VARCHAR(100) NOT NULL
)AUTO_INCREMENT=3000;

INSERT INTO `tbl_tribes`(code, name)
VALUES
('SUK','Sukuma'),
('PAR','Pare'),
('CHG','Changa'),
('GOG','Gogo'),
('KUR','Kurya'),
('SAM','Sambaa'),
('BEN','Bena');


DROP TABLE IF EXISTS `tbl_regions`;
CREATE TABLE `tbl_regions`(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	code VARCHAR(20) NOT NULL,
	name VARCHAR(100) NOT NULL
)AUTO_INCREMENT=4000;

INSERT INTO `tbl_regions`(code, name)
VALUES
('DAR','Dar es salaam'),
('AR','Arusha'),
('MNY','Manyara'),
('MTW','Mtwara'),
('TA','Tanga'),
('MWZ','Mwanza'),
('MBY','Mbeya');

DROP TABLE IF EXISTS `tbl_districts`;
CREATE TABLE `tbl_districts`(
	id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	regionId INT(11) NOT NULL,
	code VARCHAR(20) NOT NULL,
	name VARCHAR(100) NOT NULL
)AUTO_INCREMENT=5000;

INSERT INTO `tbl_districts`(regionId, code, name)
VALUES
(4000, 'BBT-DC','Babati District'),
(4000, 'BBT-TC','Babati Town Council'),
(4000, 'LNG-DC','Longido District');


DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	stationId INT(11)NOT NULL,
	firstname VARCHAR(100) NOT NULL,
	lastname VARCHAR(100) NOT NULL,
	gender VARCHAR(10)NOT NULL,
	mobile VARCHAR(12)NOT NULL,
	email VARCHAR(100)NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(62) NOT NULL,
	role VARCHAR(10) NOT NULL default 'admin',
	active INT(2) NOT NULL default 1,
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
	middlename VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	gender VARCHAR(10) NOT NULL,
	tribe VARCHAR(30) NOT NULL,
	age INT(10) NOT NULL,
	region VARCHAR(30) NOT NULL,
	district VARCHAR(30) NOT NULL,
	mobile VARCHAR(12) NOT NULL,
	notes TEXT NOT NULL,
	createdAt INT(11) NOT NULL default 0
) AUTO_INCREMENT=200300;




