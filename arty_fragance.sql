/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.0.92-community-log : Database - artyfrag_fragance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`artyfrag_fragance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `artyfrag_fragance`;

/*Table structure for table `articulo` */

DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `idArticulo` int(10) unsigned NOT NULL auto_increment,
  `titulo` varchar(250) character set utf8 default NULL,
  `parrafo` text character set utf8,
  `fotoPrincipal` varchar(250) character set utf8 default NULL,
  `ididArticulo` int(11) default NULL,
  `idMenu` smallint(5) unsigned default NULL,
  `idEstadoArticulo` tinyint(3) unsigned default NULL,
  `flagPublicar` tinyint(1) default NULL,
  `ordenArticulo` smallint(5) unsigned default NULL,
  `slugAritculo` char(150) character set utf8 default NULL,
  PRIMARY KEY  (`idArticulo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `articulo` */

insert  into `articulo`(`idArticulo`,`titulo`,`parrafo`,`fotoPrincipal`,`ididArticulo`,`idMenu`,`idEstadoArticulo`,`flagPublicar`,`ordenArticulo`,`slugAritculo`) values (1,'Collection Baroque','the collection is the best in all the word','intro.jpg',NULL,5,1,1,0,'collection-baroque'),(2,'Collection cure','is the more cheap in the word, you can do sell and buy all your products','intro.png',NULL,5,1,1,0,'collection-cure');

/*Table structure for table `biografia` */

DROP TABLE IF EXISTS `biografia`;

CREATE TABLE `biografia` (
  `idBio` int(11) NOT NULL auto_increment,
  `contenidoBio` text,
  `idIdioma` int(11) default NULL,
  PRIMARY KEY  (`idBio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `biografia` */

insert  into `biografia`(`idBio`,`contenidoBio`,`idIdioma`) values (1,'<p>Passionnée de littérature et d’Histoire, Elisabeth de Feydeau étudie à l’université Paris IV-Sorbonne, où elle obtient en 1997 son doctorat d’Histoire Contemporaine, salué à l’unanimité par le jury. Elle avait choisi d’intituler sa thèse « De l’Hygiène au Rêve : l’industrie française du parfum, de 1830 à 1945 ». </p>\r\n<p>Elle est d’abord responsable des affaires culturelles chez Chanel et Bourjois, où elle met en place et gère le conservatoire. Elisabeth y acquiert la connaissance des matières premières de la parfumerie, grâce à une formation olfactive au sein du Laboratoire des parfums. </p>\r\n<p>Ses atouts et connaissances l’encouragent à créer sa propre société de conseil en développement olfactif et culturel. Arty Fragrance voit alors le jour, redéfinissant les valeurs et collaborant au design olfactif, à la communication ou à la formation pour des noms prestigieux de la parfumerie. </p>\r\n<p>Auteure de plusieurs ouvrages sur le luxe et le parfum, Elisabeth met également en scène diverses expositions, anime ateliers et conférences à travers le monde. Au fil des années, les sens et qualités de cette historienne spécialiste du parfum l’ont placée au cœur de ce métier, investie dans les domaines les plus divers. Sa profonde compréhension de l’Histoire et son sens olfactif lui permettent d’analyser le chemin parcouru afin de comprendre les aspirations modernes et d’anticiper les tendances : un savoir faire qu’elle transmet depuis 1998 aux étudiants et futurs parfumeurs des groupes Essec et Isipca. \r\n<p>En 2010, Elisabeth de Feydeau elle est nommée Chevalier des Arts et des Lettres par le Ministre de la Culture, Frédéric Mitterrand. \r\nLa même année, elle est intronisée « Dame de la Jurade » à Saint Émilion.ms : dictionnaire, anthologie, histoire » (aux éditions R. Laffont, collections Bouquins). </p>\r\n',1),(2,'<p>Passionnée de littérature et d’Histoire, Elisabeth de Feydeau étudie à l’université Paris IV-Sorbonne, où elle obtient en 1997 son doctorat d’Histoire Contemporaine, salué à l’unanimité par le jury. Elle avait choisi d’intituler sa thèse « De l’Hygiène au Rêve : l’industrie française du parfum, de 1830 à 1945 ». </p>\r\n<p>Elle est d’abord responsable des affaires culturelles chez Chanel et Bourjois, où elle met en place et gère le conservatoire. Elisabeth y acquiert la connaissance des matières premières de la parfumerie, grâce à une formation olfactive au sein du Laboratoire des parfums. </p>\r\n<p>Ses atouts et connaissances l’encouragent à créer sa propre société de conseil en développement olfactif et culturel. Arty Fragrance voit alors le jour, redéfinissant les valeurs et collaborant au design olfactif, à la communication ou à la formation pour des noms prestigieux de la parfumerie. </p>\r\n<p>Auteure de plusieurs ouvrages sur le luxe et le parfum, Elisabeth met également en scène diverses expositions, anime ateliers et conférences à travers le monde. Au fil des années, les sens et qualités de cette historienne spécialiste du parfum l’ont placée au cœur de ce métier, investie dans les domaines les plus divers. Sa profonde compréhension de l’Histoire et son sens olfactif lui permettent d’analyser le chemin parcouru afin de comprendre les aspirations modernes et d’anticiper les tendances : un savoir faire qu’elle transmet depuis 1998 aux étudiants et futurs parfumeurs des groupes Essec et Isipca. \r\n<p>En 2010, Elisabeth de Feydeau elle est nommée Chevalier des Arts et des Lettres par le Ministre de la Culture, Frédéric Mitterrand. \r\nLa même année, elle est intronisée « Dame de la Jurade » à Saint Émilion.ms : dictionnaire, anthologie, histoire » (aux éditions R. Laffont, collections Bouquins). </p>\r\n',2);

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(10) NOT NULL auto_increment,
  `nombreCategoria` varchar(200) NOT NULL,
  `descIntro` text NOT NULL,
  `imgIntro` char(20) default NULL,
  `descPresent` text NOT NULL,
  `imgPresent` char(20) default NULL,
  `fechaCreacion` date NOT NULL,
  PRIMARY KEY  (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`idCategoria`,`nombreCategoria`,`descIntro`,`imgIntro`,`descPresent`,`imgPresent`,`fechaCreacion`) values (1,'Collections Muebles','Se muestra una cantidad aceptable \r\nde caracteres\r\nmostrando ','1.jpg','Presentacion \r\nPresentacion \r\nPresentacion \nPresentacion \nPresentacion Presentacion Presentacion Presentacion \r\nPresentacion ','2.jpg','2012-02-29');

/*Table structure for table `categoriaIdioma` */

DROP TABLE IF EXISTS `categoriaIdioma`;

CREATE TABLE `categoriaIdioma` (
  `idCategoriaIdioma` int(10) NOT NULL auto_increment,
  `idCategoria` int(10) NOT NULL,
  `nombreCategoria` varchar(200) default NULL,
  `descIntro` text,
  `descPresent` text,
  PRIMARY KEY  (`idCategoriaIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `categoriaIdioma` */

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL auto_increment,
  `nombreCiudad` char(200) default NULL,
  `idPais` int(11) default NULL,
  PRIMARY KEY  (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`idCiudad`,`nombreCiudad`,`idPais`) values (1,'PARIS',1);

/*Table structure for table `ciudadIdioma` */

DROP TABLE IF EXISTS `ciudadIdioma`;

CREATE TABLE `ciudadIdioma` (
  `idCiudadIdioma` int(11) NOT NULL auto_increment,
  `nombreCiudadIdioma` char(200) default NULL,
  `idIdioma` int(11) default NULL,
  `idCiudad` int(11) default NULL,
  PRIMARY KEY  (`idCiudadIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ciudadIdioma` */

insert  into `ciudadIdioma`(`idCiudadIdioma`,`nombreCiudadIdioma`,`idIdioma`,`idCiudad`) values (1,'PARIS',1,1),(2,'PARIS',2,1);

/*Table structure for table `core_session` */

DROP TABLE IF EXISTS `core_session`;

CREATE TABLE `core_session` (
  `Id` varchar(32) NOT NULL,
  `save_path` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL default '',
  `Modified` int(11) default NULL,
  `LifeTime` int(11) default NULL,
  `Data` text,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `core_session` */

insert  into `core_session`(`Id`,`save_path`,`name`,`Modified`,`LifeTime`,`Data`) values ('513eb7e66d853b0385af34ac2a7d12c7','','',1330708433,1440,'y428mK78zEZ6aajIt6zZT9MPFt_6-vuucrh6o9lKsHllDISW1R8Ue7NAL_Y9_KCCqYMV8KgtFW2-KbnrYQpqcPPq9vCM0Otl9w5EYNwJ2fcspncYMAkLC79UWX2Cf4vz4i95-hTgySGPFfYe2KcMk3LWsP3FRCfzQYlOrZTezulLcIgdbBlmRf8QdSGbGKtWWmnEtHQ50h-GfYck-Xo-ep5ne6NDcN4zVNptdhV4jH5Z2QcRMgYxmvsDuRMTs_vgZ9D3TEl1p5-05M3iOn67t---9m8I-p_OAKpuvCoEv9fHxTV2K_vNpQDOYotNHe81vXF6j-9SbVek-dPlR9rA5e-WdmIoVkgXMQpwmqdYq5y0T-GVS6WAcnDZ8nxVz7Wtv1kbQBBysGPGxNu--gohIl61rXGnZ2Vvf8slE8OEbZqW-9VfrRdrOPhCDUy9ZhzV-wdv5oohl1X664lfs3aArXrrlozXytlLCybqYBaUXSBfvf7QjfdLED-Whzr8kTcxeh9Rc5yxBRUUCFokajtSp-yfBdOdl4ARzj5n2cShJI3OfBIDTn_UQIM_y_4-5AlpJaYahFLgh0qaIKXzUV8p3Q..'),('89mqfhhnkt4fd8tmvql20hndj7','','',1330746145,1440,''),('49077fbf4c746ccaa78e46964fc19a89','','',1330721994,1440,''),('e1e1f423d95e2c101b8c2f35cb02a0c7','','',1330722024,1440,''),('b096b807caa8d9f39616513b7fefdb26','','',1330722778,1440,''),('a2a9d60ea8a87e8d9d3675dcbe0dafcc','','',1330739027,1440,''),('ece1ad86f2f94d49f877eeb13ec537cf','','',1330707889,1440,'rURFkKBxOhxFyakgQb6UR5XMfbKQuDCzgwD-e_SiAGo7pmM1nxshQz6XkH_i7jM0nJ7Nu_jCfsrfeZFWTSoyF2Bfiw82o7tz_AbKUb8uQo28gZtjeiIYFLK2QyMqU5ccoqbJsg1dC9NMz7O2uAr1O1FsoEHJGADj2c2jmVehBDmRQesrSBBczNauysckr-GJzDTeeVVA0Q76MeQJ-ElGZtMryrBXrTYgLkTSYj7KkFj4MvkOfp-nSFY06CAPfet3J39v4ruRr-wewlO4trDF3qxrLw-FFzS4PIeuDQ4tad5K9JMnQ-jWlr5OWaRsAxRzcFbDznd0NwIx8FdvrVJKk0EZsxcOUp6U3u9GQ6CHyvxOISKcOWv56TSREokW7KdUIxf0_4ljn3hExE2aK_tYPhMHgRby76HasOg-H6_CrXNaFfANnQoIrXjc2Id_KxdBChu7rMdNbo8r9-L87GAEBk6A2DTWEUwQ0-r88MOBsyUinlF0Omw49gJQODLyXkXRQBKYDnm9Imo-EKOFt58qBe4ZSOjDKRPGR0NTKghG8-NbQoaaASWIxlhb4YOWeVszg-DZEbUFcI3c0QtNSlX47w..'),('31bbbb1e0bcbea4509c2093e3fd809f3','','',1330744872,1440,''),('fafln4k4kmtj2s2idij2sdg6u4','','',1330644106,1440,''),('hn0ki117k4ldgpldll1ikkf326','','',1330670587,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('9770f3bf7a95d55b24c12ff5a377955e','','',1330635871,1440,''),('91e7e1eed13fd06647c4cbca1707fbf7','','',1330663650,1440,''),('6a1cf0ebb264913440536b442872a239','','',1330683034,1440,''),('oak16qcuult6kqvsjijk84lfu4','','',1330687632,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}');

/*Table structure for table `detalleArticulo` */

DROP TABLE IF EXISTS `detalleArticulo`;

CREATE TABLE `detalleArticulo` (
  `idDetalleArticulo` int(10) unsigned NOT NULL auto_increment,
  `idArticulo` int(10) unsigned default NULL,
  `titulo` varchar(150) default NULL,
  `tituloDetalle` varchar(250) default NULL,
  `parrafoDetalle` text character set utf8,
  `fotoPrincipalDetalle` varchar(250) character set utf8 default NULL,
  `slugDetalle` char(100) character set utf8 default NULL,
  PRIMARY KEY  (`idDetalleArticulo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `detalleArticulo` */

insert  into `detalleArticulo`(`idDetalleArticulo`,`idArticulo`,`titulo`,`tituloDetalle`,`parrafoDetalle`,`fotoPrincipalDetalle`,`slugDetalle`) values (1,1,'Presentation','','Check mi first presentation','presentacion.jpg','presentacion'),(2,1,'Lux','Lux - Roi The Box','Lux offer the best way of sell in the web ','lux.jpg','lux'),(3,1,'Baracko','Baracko - The way','check all the answersss','baracko.jpg','baracko'),(4,2,'Presentation','','Cour is the best way in all the word','presentation.jpg','presentation'),(5,2,'The fleur','The Fleur in our house','in your house, work, land in all the world','fleur.jpg','the-fleur'),(6,2,'The Reyne','The reyne is sick','can you help thw queen ?? XD','reyne.jpg','the-reyne');

/*Table structure for table `estadoArticulo` */

DROP TABLE IF EXISTS `estadoArticulo`;

CREATE TABLE `estadoArticulo` (
  `idEstadoArticulo` tinyint(3) unsigned NOT NULL auto_increment,
  `nombreEstado` char(16) default NULL,
  PRIMARY KEY  (`idEstadoArticulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estadoArticulo` */

/*Table structure for table `foto-detalleArticulo` */

DROP TABLE IF EXISTS `foto-detalleArticulo`;

CREATE TABLE `foto-detalleArticulo` (
  `idFoto` int(10) unsigned NOT NULL,
  `idDetalleContenido` int(10) unsigned NOT NULL,
  `tituloFoto` char(150) default NULL,
  `descripcionFoto` text,
  `link` text,
  `ordenFoto` smallint(5) unsigned default NULL,
  `flagPublicar` tinyint(1) default NULL,
  PRIMARY KEY  (`idFoto`,`idDetalleContenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `foto-detalleArticulo` */

/*Table structure for table `foto` */

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `idFoto` int(10) unsigned NOT NULL auto_increment,
  `nombreFoto` text,
  PRIMARY KEY  (`idFoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `foto` */

/*Table structure for table `fotoBio` */

DROP TABLE IF EXISTS `fotoBio`;

CREATE TABLE `fotoBio` (
  `idFotoBio` int(11) NOT NULL auto_increment,
  `nombreFotoBio` char(200) default NULL,
  PRIMARY KEY  (`idFotoBio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fotoBio` */

insert  into `fotoBio`(`idFotoBio`,`nombreFotoBio`) values (1,'img_elisafey_bio_1.jpg'),(2,'img_elisafey_bio_2.jpg');

/*Table structure for table `fotoPuntoVenta` */

DROP TABLE IF EXISTS `fotoPuntoVenta`;

CREATE TABLE `fotoPuntoVenta` (
  `idFotoPuntoVenta` int(11) NOT NULL auto_increment,
  `nombreFotoPuntoVenta` char(100) default NULL,
  `idPuntoVenta` int(11) default NULL,
  PRIMARY KEY  (`idFotoPuntoVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fotoPuntoVenta` */

insert  into `fotoPuntoVenta`(`idFotoPuntoVenta`,`nombreFotoPuntoVenta`,`idPuntoVenta`) values (1,'imagen1.jpg',1),(2,'imagen2.jpg',1);

/*Table structure for table `idioma` */

DROP TABLE IF EXISTS `idioma`;

CREATE TABLE `idioma` (
  `idIdioma` smallint(5) unsigned NOT NULL auto_increment,
  `PrefIdioma` char(10) character set utf8 default NULL,
  `NombreIdioma` char(50) character set utf8 default NULL,
  `EstadoIdioma` int(11) default NULL,
  `FlagDefaultIdioma` int(11) default NULL,
  `icono` varchar(25) character set utf8 default NULL,
  PRIMARY KEY  (`idIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `idioma` */

insert  into `idioma`(`idIdioma`,`PrefIdioma`,`NombreIdioma`,`EstadoIdioma`,`FlagDefaultIdioma`,`icono`) values (1,'fr','frances',1,1,'cv.png'),(2,'en','ingles',1,0,'ax.png');

/*Table structure for table `idiomaTipoSite` */

DROP TABLE IF EXISTS `idiomaTipoSite`;

CREATE TABLE `idiomaTipoSite` (
  `idIdiomaSite` int(11) NOT NULL auto_increment,
  `idTipoSite` int(11) default NULL,
  `idIdioma` int(11) default NULL,
  `nombreIdiomaTipoSite` char(200) default NULL,
  PRIMARY KEY  (`idIdiomaSite`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `idiomaTipoSite` */

insert  into `idiomaTipoSite`(`idIdiomaSite`,`idTipoSite`,`idIdioma`,`nombreIdiomaTipoSite`) values (1,1,1,'SITE INTERNET'),(2,1,2,'WEBSITE'),(3,2,1,'BLOG'),(4,2,2,'BLOG');

/*Table structure for table `imgProducto` */

DROP TABLE IF EXISTS `imgProducto`;

CREATE TABLE `imgProducto` (
  `idImagen` int(10) NOT NULL auto_increment,
  `idProducto` int(10) NOT NULL,
  `descripcion` text,
  `imagen` varchar(150) default NULL,
  PRIMARY KEY  (`idImagen`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `imgProducto` */

insert  into `imgProducto`(`idImagen`,`idProducto`,`descripcion`,`imagen`) values (1,1,'esta \r\nmesa es lo maximo','1.jpg'),(2,1,'mejor performance','2.jpg'),(3,1,'mayor estabilidad','3.jpg'),(4,2,'buena muy buena estructura','4.jpg'),(5,2,'no hay mejor \r\nque esta \r\nestructura','5.jpg');

/*Table structure for table `imgProductoIdioma` */

DROP TABLE IF EXISTS `imgProductoIdioma`;

CREATE TABLE `imgProductoIdioma` (
  `idImagenIdioma` int(10) NOT NULL auto_increment,
  `idImagen` int(10) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`idImagenIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `imgProductoIdioma` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL auto_increment,
  `idMenuBase` int(11) default NULL,
  `nombreMenu` char(20) default NULL,
  `idIdioma` int(5) default NULL,
  PRIMARY KEY  (`idMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`idMenu`,`idMenuBase`,`nombreMenu`,`idIdioma`) values (1,1,'Accueil',1),(2,1,'Welcome',2),(3,2,'arty fragrance',1),(4,2,'arty fragrance',2),(5,3,'collections',1),(6,3,'collections',2),(7,4,'contact',1),(8,4,'contan',2),(9,5,'elisabeth de feydeau',1),(10,5,'elisabeth de feydeau',2),(11,6,'mecenat versailles',1),(12,6,'patronage versailles',2),(13,7,'points de vente',1),(14,7,'outlets',2),(15,8,'presse',1),(16,8,'press',2),(17,9,'blog',1),(18,9,'blog',2),(19,10,'recomanderle site',1),(20,10,'recommend the site',2),(21,11,'liens-amis',1),(22,11,'friends links',2),(23,12,'credits',1),(24,12,'credits',2),(25,13,'mentions-legales',1),(26,13,'legal notices',2),(27,14,'presentacion',1),(28,14,'presentacion',2),(29,15,'Charte qualité',1),(30,15,'Charte qualité',2),(31,16,'Précautions d’usag',1),(32,16,'Précautions d’usag',2),(33,17,'Commandes spéciales',1),(34,17,'Commandes spéciales',2),(35,18,'actualites',1),(36,18,'actualites',2),(37,19,'liens Amis',1),(38,19,'liens Amis',2),(39,20,'Biographie',1),(40,20,'Biographie',2),(41,21,'Ouvrages',1),(42,21,'Ouvrages',2),(43,22,'Realisations',1),(44,22,'Realisations',2),(45,23,'Blog Et Photos',1),(46,23,'Blog Et Photos',2);

/*Table structure for table `menubase` */

DROP TABLE IF EXISTS `menubase`;

CREATE TABLE `menubase` (
  `idMenuBase` int(11) NOT NULL auto_increment,
  `rutaMenuBase` char(50) default NULL,
  `slugMenuBase` char(20) default NULL,
  `nombreMenuBase` char(50) default NULL,
  `idModulo` smallint(5) unsigned default NULL,
  `idTipoMenu` int(11) default NULL,
  `rutaMenuAdmin` char(50) default NULL,
  `fotoMenu` varchar(150) default NULL,
  PRIMARY KEY  (`idMenuBase`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `menubase` */

insert  into `menubase`(`idMenuBase`,`rutaMenuBase`,`slugMenuBase`,`nombreMenuBase`,`idModulo`,`idTipoMenu`,`rutaMenuAdmin`,`fotoMenu`) values (1,'accueil','accueil','accueil',1,1,'index/accueil',NULL),(2,'arty-fragance','arty-fragance','arty-fragance',1,1,NULL,NULL),(3,'collections','collections','collections',1,NULL,'index/collections',NULL),(4,'contact','contact','contact',1,NULL,NULL,NULL),(5,'elisabeth-de-feydeau','elisabeth-de-feydeau','elisabeth-de-feydeau',1,NULL,NULL,NULL),(6,'mecenat-versailles','mecenat-versailles','mecenat-versailles',1,NULL,NULL,NULL),(7,'points-de-vente','points-de-vente','points-de-vente',1,NULL,'pointventa/index',NULL),(8,'presse','presse','presse',1,NULL,NULL,NULL),(9,'blog','blog','blog',2,NULL,NULL,NULL),(10,'recomanderle-site','recomanderle-site','recomanderle-site',2,NULL,NULL,NULL),(11,'liens-amis','liens-amis','liens-amis',3,NULL,NULL,NULL),(12,'credits','credits','credits',3,NULL,NULL,NULL),(13,'mentions-legales','mentions-legales','mentions-legales',3,NULL,NULL,NULL),(14,'presentacion-14','presentacion','presentacion',4,1,NULL,NULL),(15,'charte-qualite-15','charte-qualite','charte-qualite',4,1,NULL,NULL),(16,'precautions-d-usag-16','precautions-d-usag','Précautions d’usag',4,1,NULL,NULL),(17,'commandes-speciales-17','commandes-speciales','Commandes spéciales',4,1,NULL,NULL),(18,'actualites','actualites','actualites',4,2,NULL,NULL),(19,'','liens-amis','liens-amis',5,2,NULL,NULL),(20,'','biographie','Biographie',6,2,NULL,NULL),(21,'ouvrages','ouvrages','Ouvrages',6,2,NULL,NULL),(22,'realisations','realisations','Realisations',6,2,NULL,NULL),(23,'blog-et-photos','blog-et-photos','Blog Et Photos',6,2,NULL,NULL);

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `idModulo` smallint(5) unsigned NOT NULL auto_increment,
  `nombreModulo` char(50) default NULL,
  `idTipoModulo` int(11) default NULL,
  PRIMARY KEY  (`idModulo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `modulo` */

insert  into `modulo`(`idModulo`,`nombreModulo`,`idTipoModulo`) values (1,'MenuSuperior',NULL),(2,'MenuFooter1',NULL),(3,'MenuFooter2',NULL),(4,'Arty Fragrance',NULL),(5,'Liens Amis',NULL),(6,'Elisabeth De Feydeau',NULL);

/*Table structure for table `obra` */

DROP TABLE IF EXISTS `obra`;

CREATE TABLE `obra` (
  `idObra` int(11) NOT NULL auto_increment,
  `tituloObra` text,
  `parrafoObra` text,
  `link` text,
  `imgObra` char(200) default NULL,
  PRIMARY KEY  (`idObra`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `obra` */

insert  into `obra`(`idObra`,`tituloObra`,`parrafoObra`,`link`,`imgObra`) values (1,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','/',NULL),(2,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','/',NULL);

/*Table structure for table `obraIdioma` */

DROP TABLE IF EXISTS `obraIdioma`;

CREATE TABLE `obraIdioma` (
  `idObraIdioma` int(11) NOT NULL auto_increment,
  `tituloObraIdioma` text,
  `parrafoObraIdioma` text,
  `idObra` int(11) default NULL,
  `idIdioma` int(11) default NULL,
  PRIMARY KEY  (`idObraIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `obraIdioma` */

insert  into `obraIdioma`(`idObraIdioma`,`tituloObraIdioma`,`parrafoObraIdioma`,`idObra`,`idIdioma`) values (1,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',1,1),(2,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',1,2),(3,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',2,1),(4,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',2,2);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL auto_increment,
  `nombrePais` char(200) default NULL,
  `slugPais` char(200) default NULL,
  PRIMARY KEY  (`idPais`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`idPais`,`nombrePais`,`slugPais`) values (1,'Francia','francia'),(2,'Belgica','belgica'),(3,'Core du sur','core-du-sur');

/*Table structure for table `paisIdioma` */

DROP TABLE IF EXISTS `paisIdioma`;

CREATE TABLE `paisIdioma` (
  `idPaisIdioma` int(11) NOT NULL auto_increment,
  `nombrePaisIdioma` char(100) default NULL,
  `idIdioma` int(11) default NULL,
  `idPais` int(11) default NULL,
  PRIMARY KEY  (`idPaisIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `paisIdioma` */

insert  into `paisIdioma`(`idPaisIdioma`,`nombrePaisIdioma`,`idIdioma`,`idPais`) values (1,'Francia',1,1),(2,'Francia',2,1),(3,'Belgica',1,2),(4,'Belgica',2,2),(5,'Core du sur',1,3),(6,'Core du sur',2,3);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idProducto` int(10) NOT NULL auto_increment,
  `idCategoria` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nombreLargo` varchar(200) NOT NULL,
  `slugProducto` char(150) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` char(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificacion` date default NULL,
  PRIMARY KEY  (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

insert  into `producto`(`idProducto`,`idCategoria`,`nombre`,`nombreLargo`,`slugProducto`,`descripcion`,`estado`,`fechaCreacion`,`fechaModificacion`) values (1,1,'Mesaa 1','Mesaa 1 realmente buena','mesa-buena','mesa elaborada con la mas fina estampa	\r\ny materiales','1','2012-02-29','2012-02-29'),(2,1,'Messa 2','Messa 2 excelente','mesa-excelente','lo mejor de\r\ntodo es que\r\naqui se tiene','1','2012-02-29','2012-12-29');

/*Table structure for table `productoIdioma` */

DROP TABLE IF EXISTS `productoIdioma`;

CREATE TABLE `productoIdioma` (
  `idProductoIdioma` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `nombre` varchar(150) default NULL,
  `nombreLargo` varchar(200) NOT NULL,
  `slugProducto` char(150) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`idProductoIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `productoIdioma` */

/*Table structure for table `puntoventa` */

DROP TABLE IF EXISTS `puntoventa`;

CREATE TABLE `puntoventa` (
  `IdPuntoVenta` int(11) NOT NULL auto_increment,
  `idPais` int(11) default NULL,
  `idCiudad` int(11) default NULL,
  `nombrePuntoVenta` char(100) default NULL,
  `direccionPuntoVenta` char(200) default NULL,
  `direccionWebPuntoVenta` char(200) default NULL,
  `telefonoPuntoVenta` char(200) default NULL,
  PRIMARY KEY  (`IdPuntoVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `puntoventa` */

insert  into `puntoventa`(`IdPuntoVenta`,`idPais`,`idCiudad`,`nombrePuntoVenta`,`direccionPuntoVenta`,`direccionWebPuntoVenta`,`telefonoPuntoVenta`) values (1,1,1,'Boutique Jovoy','29, rue Danielle Casanova','www.jovoy.com','123 23 234'),(2,1,1,'Boutique Jovoy2','29, rue Danielle Casanova','www.jovoy1.com','123 234 12');

/*Table structure for table `puntoventaIdioma` */

DROP TABLE IF EXISTS `puntoventaIdioma`;

CREATE TABLE `puntoventaIdioma` (
  `idPuntoVentaIdioma` int(11) NOT NULL auto_increment,
  `idPuntoVenta` int(11) default NULL,
  `nombrePuntoVenta` char(100) default NULL,
  `idIdioma` int(11) default NULL,
  `direccionWebPuntoVenta` varchar(250) default NULL,
  PRIMARY KEY  (`idPuntoVentaIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `puntoventaIdioma` */

insert  into `puntoventaIdioma`(`idPuntoVentaIdioma`,`idPuntoVenta`,`nombrePuntoVenta`,`idIdioma`,`direccionWebPuntoVenta`) values (1,1,'Boutique Jovoy',1,NULL),(2,1,'Boutique Jovoy',2,NULL),(3,2,'Boutique Jovoy2',1,NULL),(4,2,'Boutique Jovoy2',2,NULL);

/*Table structure for table `site` */

DROP TABLE IF EXISTS `site`;

CREATE TABLE `site` (
  `idSite` int(11) NOT NULL auto_increment,
  `nombreSite` char(100) default NULL,
  `urlSite` text,
  `urlMostrar` char(200) default NULL,
  `idTipoSite` int(11) default NULL,
  `estado` int(11) default NULL,
  PRIMARY KEY  (`idSite`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `site` */

insert  into `site`(`idSite`,`nombreSite`,`urlSite`,`urlMostrar`,`idTipoSite`,`estado`) values (1,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(2,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(3,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(4,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(5,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1),(6,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1),(7,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1);

/*Table structure for table `tipomenu` */

DROP TABLE IF EXISTS `tipomenu`;

CREATE TABLE `tipomenu` (
  `idTipoMenu` int(11) NOT NULL auto_increment,
  `nombreTipoMenu` char(100) default NULL,
  PRIMARY KEY  (`idTipoMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipomenu` */

insert  into `tipomenu`(`idTipoMenu`,`nombreTipoMenu`) values (1,'pagina'),(2,'modulo'),(3,'url Externa'),(4,'url Interna');

/*Table structure for table `tiposite` */

DROP TABLE IF EXISTS `tiposite`;

CREATE TABLE `tiposite` (
  `idTipoSite` int(11) NOT NULL auto_increment,
  `nombreTipoSite` char(50) default NULL,
  PRIMARY KEY  (`idTipoSite`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tiposite` */

insert  into `tiposite`(`idTipoSite`,`nombreTipoSite`) values (1,'SITE INTERNET'),(2,'BLOG');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL auto_increment,
  `nombre` char(50) collate utf8_unicode_ci default NULL,
  `apellidopaterno` char(50) collate utf8_unicode_ci default NULL,
  `apellidomaterno` char(50) collate utf8_unicode_ci default NULL,
  `idtipousuario` int(11) default '1',
  `estado` int(11) default '1',
  `login` char(20) collate utf8_unicode_ci default NULL,
  `password` char(20) collate utf8_unicode_ci default NULL,
  `telefono` char(15) collate utf8_unicode_ci default NULL,
  `correo` char(100) collate utf8_unicode_ci default NULL,
  `FlagSuperUsuario` int(1) default '0',
  `idcliente` int(11) default NULL,
  `dni` int(8) default NULL,
  `direccion` text collate utf8_unicode_ci,
  PRIMARY KEY  (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`idusuario`,`nombre`,`apellidopaterno`,`apellidomaterno`,`idtipousuario`,`estado`,`login`,`password`,`telefono`,`correo`,`FlagSuperUsuario`,`idcliente`,`dni`,`direccion`) values (1,'marcelo','carranza','torres',1,1,'marrselo@gmail.com','123123','22312223','marrselo@gmail.com',1,NULL,10104587,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
