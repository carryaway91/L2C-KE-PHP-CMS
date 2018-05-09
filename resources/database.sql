CREATE DATABASE IF NOT EXISTS L2C_KE_PHP_CMS;
USE L2C_KE_PHP_CMS;

CREATE TABLE Users (
	ID Int,
	email varchar(256),
	password varchar(64),
	nickname varchar(128),
	PRIMARY KEY (ID)
);

CREATE TABLE Pages (
	ID int,
	title varchar(128),
	content TEXT,
	User_ID int,
	menu_label varchar(128),
	menu_order int,
	PRIMARY KEY (ID),
	FOREIGN KEY (User_ID) REFERENCES (Users) ON DELETE CASCADE
);

INSERT INTO Users (nickname) VALUES 'carry';