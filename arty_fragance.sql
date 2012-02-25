/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.5.15-log : Database - arty_fragrance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`arty_fragrance` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `arty_fragrance`;

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `idContenido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `parrafo` text CHARACTER SET utf8,
  `fotoPrincipal` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `ididContenido` int(11) DEFAULT NULL,
  `idModulo` smallint(5) unsigned DEFAULT NULL,
  `idIdioma` smallint(5) unsigned DEFAULT NULL,
  `idEstadoContenido` tinyint(3) unsigned DEFAULT NULL,
  `flagPublicar` tinyint(1) DEFAULT NULL,
  `ordenContenido` smallint(5) unsigned DEFAULT NULL,
  `slugContenido` char(150) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idContenido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `contenido` */

LOCK TABLES `contenido` WRITE;

UNLOCK TABLES;

/*Table structure for table `core_session` */

DROP TABLE IF EXISTS `core_session`;

CREATE TABLE `core_session` (
  `Id` varchar(32) NOT NULL,
  `save_path` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '',
  `Modified` int(11) DEFAULT NULL,
  `LifeTime` int(11) DEFAULT NULL,
  `Data` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `core_session` */

LOCK TABLES `core_session` WRITE;

insert  into `core_session`(`Id`,`save_path`,`name`,`Modified`,`LifeTime`,`Data`) values ('2p06fnbhhh7k9uo3q8ah6pm8d4','','',1330002622,1440,'CESecurity|s:320:\"MzAwfDEwMDAwfDEwMDB8MTAwMHwxMDAwfC9VcGxvYWRzfC9VcGxvYWRzfC9VcGxvYWRzfC9UZW1wbGF0ZXN8L1VwbG9hZHN8dHJ1ZXx0cnVlfHRydWV8dHJ1ZXwuanBnLC5qcGVnLC5naWYsLnBuZ3wuYXZpLC5tcGcsLm1wZWcsLm1wMywud2F2LC53bXZ8LnR4dCwuZG9jLC5wZGYsLnppcCwucmFyLC5hdmksLm1wZywubXBlZywuanBnLC5qcGVnLC5naWYsLnBuZywuaHRtfC5odG1sLC5odG18ZW4tZW58fHx8fHxmYWxzZXw=\";'),('c1on9f7uoui716hjgm3t1clos0','','',1330184760,1440,''),('mg7ohuk5ok51hmhqbh1v6fb603','','',1330151746,1440,''),('rc4b2fj1kkfonbpi8pc2eq6886','','',1330117524,1440,''),('ve5tpk0g7tmg3tslbuetr6if33','','',1330066593,1440,'');

UNLOCK TABLES;

/*Table structure for table `detallecontenido` */

DROP TABLE IF EXISTS `detallecontenido`;

CREATE TABLE `detallecontenido` (
  `idDetalleContenido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idContenido` int(10) unsigned DEFAULT NULL,
  `tituloDetalle` varchar(250) DEFAULT NULL,
  `parrafoDetalle` text CHARACTER SET utf8,
  `fotoPrincipalDetalle` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `slugDetalle` char(100) DEFAULT NULL,
  PRIMARY KEY (`idDetalleContenido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detallecontenido` */

LOCK TABLES `detallecontenido` WRITE;

UNLOCK TABLES;

/*Table structure for table `estadocontenido` */

DROP TABLE IF EXISTS `estadocontenido`;

CREATE TABLE `estadocontenido` (
  `idEstadoContenido` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombreEstado` char(16) DEFAULT NULL,
  PRIMARY KEY (`idEstadoContenido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estadocontenido` */

LOCK TABLES `estadocontenido` WRITE;

UNLOCK TABLES;

/*Table structure for table `foto` */

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `idFoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreFoto` text,
  PRIMARY KEY (`idFoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `foto` */

LOCK TABLES `foto` WRITE;

UNLOCK TABLES;

/*Table structure for table `foto-contenido` */

DROP TABLE IF EXISTS `foto-contenido`;

CREATE TABLE `foto-contenido` (
  `idFoto` int(10) unsigned NOT NULL,
  `idDetalleContenido` int(10) unsigned NOT NULL,
  `tituloFoto` char(150) DEFAULT NULL,
  `descripcionFoto` text,
  `link` text,
  `ordenFoto` smallint(5) unsigned DEFAULT NULL,
  `flagPublicar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idFoto`,`idDetalleContenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `foto-contenido` */

LOCK TABLES `foto-contenido` WRITE;

UNLOCK TABLES;

/*Table structure for table `idioma` */

DROP TABLE IF EXISTS `idioma`;

CREATE TABLE `idioma` (
  `idIdioma` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `PrefIdioma` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `NombreIdioma` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `EstadoIdioma` int(11) DEFAULT NULL,
  `FlagDefaultIdioma` int(11) DEFAULT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `idioma` */

LOCK TABLES `idioma` WRITE;

insert  into `idioma`(`idIdioma`,`PrefIdioma`,`NombreIdioma`,`EstadoIdioma`,`FlagDefaultIdioma`) values (1,'fr','frances',1,1),(2,'en','ingles',1,0);

UNLOCK TABLES;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `idMenuBase` int(11) DEFAULT NULL,
  `nombreMenu` char(20) DEFAULT NULL,
  `idIdioma` int(5) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

LOCK TABLES `menu` WRITE;

insert  into `menu`(`idMenu`,`idMenuBase`,`nombreMenu`,`idIdioma`) values (1,1,'Accueil',1),(2,2,'ArtyFragance',1),(3,1,'Welcome',2),(4,2,'Art Fragancia',2);

UNLOCK TABLES;

/*Table structure for table `menubase` */

DROP TABLE IF EXISTS `menubase`;

CREATE TABLE `menubase` (
  `idMenuBase` int(11) NOT NULL AUTO_INCREMENT,
  `rutaMenuBase` char(50) DEFAULT NULL,
  `slugMenuBase` char(20) DEFAULT NULL,
  `nombreMenuBase` char(50) DEFAULT NULL,
  `idModulo` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`idMenuBase`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `menubase` */

LOCK TABLES `menubase` WRITE;

insert  into `menubase`(`idMenuBase`,`rutaMenuBase`,`slugMenuBase`,`nombreMenuBase`,`idModulo`) values (1,'accueil','accueil','Accueil',1),(2,'arty-fragance','ArtyFragance','ArtyFragance',1);

UNLOCK TABLES;

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `idModulo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombreModulo` char(50) DEFAULT NULL,
  `idTipoModulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `modulo` */

LOCK TABLES `modulo` WRITE;

insert  into `modulo`(`idModulo`,`nombreModulo`,`idTipoModulo`) values (1,'MenuSuperior',NULL),(2,'MenuFooter',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
