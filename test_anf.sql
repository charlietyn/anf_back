# SQL Manager 2007 for MySQL 4.1.2.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : test_anf


SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `test_anf`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `test_anf`;

#
# Structure for the `datos` table : 
#

CREATE TABLE `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `correo_2` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for the `datos` table  (LIMIT 0,500)
#

INSERT INTO `datos` (`id`, `nombre`, `apellidos`, `edad`, `sexo`, `correo`) VALUES 
  (2,'Maria Cairo','Rodriguez',22,'Masculino','maria@gmail.com'),
  (3,'Carlito','Vers Ter',23,'Masculino','carlito@gmail.com'),
  (4,'Amanda','Perez Gonzales',23,'Femenino','amanda@gmail.com'),
  (5,'Jose','Gonzales',23,'Masculino','jose@gmail.com'),
  (6,'Pedro','Gonzalez',23,'Masculino','pedro@gmail.com'),
  (7,'Pedro Aleberto','Perez',23,'Masculino','pedroPerez@gmail.com'),
  (8,'Juan','Perez',23,'Masculino','kk@gmail.com');

COMMIT;

