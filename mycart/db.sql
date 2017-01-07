create database `login`;

use `login`;

CREATE TABLE 'login'(
'id' INT(10) NOT NULL AUTO_INCREMENT,
'name' VARCHAR(25) NOT NULL,
'email' VARCHAR(30) NOT NULL,
'username' VARCHAR(15) NOT NULL,
'password' VARCHAR(25) NOT NULL,
PRIMARY KEY ('id');


CREATE TABLE 'items' (
'id' INT(10) NOT NULL AUTO_INCREMENT,
'name' VARCHAR(25) NOT NULL,
'qty' INT(5) NOT NULL,
'cost' DECIMAL(10,2) NOT NULL,
PRIMARY KEY ('id'),
CONSTRAINT FK_items_1
FOREING KEY (login_id) REFERENCES login(id) 
ON UPDATE CASCADE ON DELETE CASCADE
);









)