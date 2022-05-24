# Site layout

It is a simple realization back-end part of site layout. With admin panel for adding, editing, deleting pages.\

To run my code you must create a table in SQL.\
CREATE DATABASE `pages_list`;

USE `pages_list`;

CREATE TABLE `pages`
(`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `url` VARCHAR(30),
 `title` VARCHAR(30),
 `text` TEXT
);

INSERT INTO `pages`(`url`, `title`, `text`) VALUES ('/','index','index'),('404','file not found','file not found'),('about','about','about');


