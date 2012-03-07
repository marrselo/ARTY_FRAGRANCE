/*
SQLyog Community v8.71 
MySQL - 5.1.53-log : Database - artyfrag_fragance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`artyfrag_fragance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `artyfrag_fragance`;

/*Table structure for table `articulo` */

DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `idArticulo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `parrafo` text CHARACTER SET utf8,
  `fotoPrincipal` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `ididArticulo` int(11) DEFAULT NULL,
  `idMenu` smallint(5) unsigned DEFAULT NULL,
  `idEstadoArticulo` tinyint(3) unsigned DEFAULT NULL,
  `flagPublicar` tinyint(1) DEFAULT NULL,
  `ordenArticulo` smallint(5) unsigned DEFAULT NULL,
  `slugArticulo` char(150) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idArticulo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `articulo` */

insert  into `articulo`(`idArticulo`,`titulo`,`parrafo`,`fotoPrincipal`,`ididArticulo`,`idMenu`,`idEstadoArticulo`,`flagPublicar`,`ordenArticulo`,`slugArticulo`) values (6,'ingles','<p>\r\n	ingles</p>\r\n','collection-6.',NULL,6,0,1,NULL,'1'),(2,'Collection cure1','<p>\r\n	<strong>is the more ch<span style=\"background-color:#ffff00;\">eap in the word, you can do sell and buy all your pr</span>oductsfdsfd 1</strong></p>\r\n','collection-2.jpg',NULL,5,0,1,0,'collection-cure'),(3,'nueva','<p>\r\n	nuevaaa</p>\r\n','collection-3.jpg',NULL,5,1,1,NULL,'1'),(4,'dasdas','<p>\r\n	fdsfds</p>\r\n','collection-4.jpg',NULL,6,1,1,NULL,'1'),(5,'dasd2','<p>\r\n	22fdsfdsfs</p>\r\n','collection-5.',NULL,5,1,1,NULL,'1'),(7,'ingles 2','<p>\r\n	ingles 2</p>\r\n','collection-7.png',NULL,6,1,1,NULL,'1'),(8,'frances 22','<p>\r\n	frances 22</p>\r\n','collection-8.',NULL,5,1,1,NULL,'1');

/*Table structure for table `biografia` */

DROP TABLE IF EXISTS `biografia`;

CREATE TABLE `biografia` (
  `idBio` int(11) NOT NULL AUTO_INCREMENT,
  `contenidoBio` text,
  `idIdioma` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `biografia` */

insert  into `biografia`(`idBio`,`contenidoBio`,`idIdioma`) values (1,'<p>Passionnée de littérature et d’Histoire, Elisabeth de Feydeau étudie à l’université Paris IV-Sorbonne, où elle obtient en 1997 son doctorat d’Histoire Contemporaine, salué à l’unanimité par le jury. Elle avait choisi d’intituler sa thèse « De l’Hygiène au Rêve : l’industrie française du parfum, de 1830 à 1945 ». </p>\r\n<p>Elle est d’abord responsable des affaires culturelles chez Chanel et Bourjois, où elle met en place et gère le conservatoire. Elisabeth y acquiert la connaissance des matières premières de la parfumerie, grâce à une formation olfactive au sein du Laboratoire des parfums. </p>\r\n<p>Ses atouts et connaissances l’encouragent à créer sa propre société de conseil en développement olfactif et culturel. Arty Fragrance voit alors le jour, redéfinissant les valeurs et collaborant au design olfactif, à la communication ou à la formation pour des noms prestigieux de la parfumerie. </p>\r\n<p>Auteure de plusieurs ouvrages sur le luxe et le parfum, Elisabeth met également en scène diverses expositions, anime ateliers et conférences à travers le monde. Au fil des années, les sens et qualités de cette historienne spécialiste du parfum l’ont placée au cœur de ce métier, investie dans les domaines les plus divers. Sa profonde compréhension de l’Histoire et son sens olfactif lui permettent d’analyser le chemin parcouru afin de comprendre les aspirations modernes et d’anticiper les tendances : un savoir faire qu’elle transmet depuis 1998 aux étudiants et futurs parfumeurs des groupes Essec et Isipca. \r\n<p>En 2010, Elisabeth de Feydeau elle est nommée Chevalier des Arts et des Lettres par le Ministre de la Culture, Frédéric Mitterrand. \r\nLa même année, elle est intronisée « Dame de la Jurade » à Saint Émilion.ms : dictionnaire, anthologie, histoire » (aux éditions R. Laffont, collections Bouquins). </p>\r\n',1),(2,'<p>Passionnée de littérature et d’Histoire, Elisabeth de Feydeau étudie à l’université Paris IV-Sorbonne, où elle obtient en 1997 son doctorat d’Histoire Contemporaine, salué à l’unanimité par le jury. Elle avait choisi d’intituler sa thèse « De l’Hygiène au Rêve : l’industrie française du parfum, de 1830 à 1945 ». </p>\r\n<p>Elle est d’abord responsable des affaires culturelles chez Chanel et Bourjois, où elle met en place et gère le conservatoire. Elisabeth y acquiert la connaissance des matières premières de la parfumerie, grâce à une formation olfactive au sein du Laboratoire des parfums. </p>\r\n<p>Ses atouts et connaissances l’encouragent à créer sa propre société de conseil en développement olfactif et culturel. Arty Fragrance voit alors le jour, redéfinissant les valeurs et collaborant au design olfactif, à la communication ou à la formation pour des noms prestigieux de la parfumerie. </p>\r\n<p>Auteure de plusieurs ouvrages sur le luxe et le parfum, Elisabeth met également en scène diverses expositions, anime ateliers et conférences à travers le monde. Au fil des années, les sens et qualités de cette historienne spécialiste du parfum l’ont placée au cœur de ce métier, investie dans les domaines les plus divers. Sa profonde compréhension de l’Histoire et son sens olfactif lui permettent d’analyser le chemin parcouru afin de comprendre les aspirations modernes et d’anticiper les tendances : un savoir faire qu’elle transmet depuis 1998 aux étudiants et futurs parfumeurs des groupes Essec et Isipca. \r\n<p>En 2010, Elisabeth de Feydeau elle est nommée Chevalier des Arts et des Lettres par le Ministre de la Culture, Frédéric Mitterrand. \r\nLa même année, elle est intronisée « Dame de la Jurade » à Saint Émilion.ms : dictionnaire, anthologie, histoire » (aux éditions R. Laffont, collections Bouquins). </p>\r\n',2);

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(200) NOT NULL,
  `descIntro` text NOT NULL,
  `imgIntro` char(20) DEFAULT NULL,
  `descPresent` text NOT NULL,
  `imgPresent` char(20) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`idCategoria`,`nombreCategoria`,`descIntro`,`imgIntro`,`descPresent`,`imgPresent`,`fechaCreacion`) values (1,'Collections Muebles','Se muestra una cantidad aceptable \r\nde caracteres\r\nmostrando ','1.jpg','Presentacion \r\nPresentacion \r\nPresentacion \nPresentacion \nPresentacion Presentacion Presentacion Presentacion \r\nPresentacion ','2.jpg','2012-02-29');

/*Table structure for table `categoriaidioma` */

DROP TABLE IF EXISTS `categoriaidioma`;

CREATE TABLE `categoriaidioma` (
  `idCategoriaIdioma` int(10) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(10) NOT NULL,
  `nombreCategoria` varchar(200) DEFAULT NULL,
  `descIntro` text,
  `descPresent` text,
  PRIMARY KEY (`idCategoriaIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `categoriaidioma` */

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCiudad` char(200) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`idCiudad`,`nombreCiudad`,`idPais`) values (1,'PARIS',1);

/*Table structure for table `ciudadidioma` */

DROP TABLE IF EXISTS `ciudadidioma`;

CREATE TABLE `ciudadidioma` (
  `idCiudadIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCiudadIdioma` char(200) DEFAULT NULL,
  `idIdioma` int(11) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCiudadIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ciudadidioma` */

insert  into `ciudadidioma`(`idCiudadIdioma`,`nombreCiudadIdioma`,`idIdioma`,`idCiudad`) values (1,'PARIS',1,1),(2,'PARIS',2,1);

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

insert  into `core_session`(`Id`,`save_path`,`name`,`Modified`,`LifeTime`,`Data`) values ('g51e14nidht6rgd3f65o9qfl65','','',1330896882,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}');

/*Table structure for table `detallearticulo` */

DROP TABLE IF EXISTS `detallearticulo`;

CREATE TABLE `detallearticulo` (
  `idDetalleArticulo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idArticulo` int(10) unsigned DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `tituloDetalle` varchar(250) DEFAULT NULL,
  `parrafoDetalle` text CHARACTER SET utf8,
  `fotoPrincipalDetalle` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `slugDetalle` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`idDetalleArticulo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `detallearticulo` */

insert  into `detallearticulo`(`idDetalleArticulo`,`idArticulo`,`titulo`,`tituloDetalle`,`parrafoDetalle`,`fotoPrincipalDetalle`,`slugDetalle`,`estado`) values (4,2,'Presentation','','<p>\r\n	<u>Cour is the best way in all the word in thw worddaa</u></p>\r\n','presentation.jpg','presentation','0'),(5,2,'dasdas ','dasdasd','fds fslfksd ','fdas.jpf','fsdf','0');

/*Table structure for table `estadoarticulo` */

DROP TABLE IF EXISTS `estadoarticulo`;

CREATE TABLE `estadoarticulo` (
  `idEstadoArticulo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombreEstado` char(16) DEFAULT NULL,
  PRIMARY KEY (`idEstadoArticulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `estadoarticulo` */

/*Table structure for table `foto` */

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `idFoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreFoto` varchar(100) NOT NULL,
  PRIMARY KEY (`idFoto`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `foto` */

insert  into `foto`(`idFoto`,`nombreFoto`) values (1,'producto-1-4.png');

/*Table structure for table `foto_detallearticulo` */

DROP TABLE IF EXISTS `foto_detallearticulo`;

CREATE TABLE `foto_detallearticulo` (
  `idFoto` int(10) unsigned NOT NULL,
  `idDetalleArticulo` int(10) unsigned NOT NULL,
  `tituloFoto` char(150) DEFAULT NULL,
  `descripcionFoto` text,
  `link` text,
  `ordenFoto` smallint(5) unsigned DEFAULT NULL,
  `flagPublicar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idFoto`,`idDetalleArticulo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `foto_detallearticulo` */

insert  into `foto_detallearticulo`(`idFoto`,`idDetalleArticulo`,`tituloFoto`,`descripcionFoto`,`link`,`ordenFoto`,`flagPublicar`) values (1,4,'54654',NULL,NULL,1,1);

/*Table structure for table `fotobio` */

DROP TABLE IF EXISTS `fotobio`;

CREATE TABLE `fotobio` (
  `idFotoBio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFotoBio` char(200) DEFAULT NULL,
  PRIMARY KEY (`idFotoBio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fotobio` */

insert  into `fotobio`(`idFotoBio`,`nombreFotoBio`) values (1,'img_elisafey_bio_1.jpg'),(2,'img_elisafey_bio_2.jpg');

/*Table structure for table `fotoobra` */

DROP TABLE IF EXISTS `fotoobra`;

CREATE TABLE `fotoobra` (
  `idFotoObra` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFotoObra` char(200) DEFAULT NULL,
  `idObra` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFotoObra`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fotoobra` */

insert  into `fotoobra`(`idFotoObra`,`nombreFotoObra`,`idObra`) values (1,'img_elisafey_ouvrages.jpg',1),(2,'img_elisafey_ouvrages.jpg',2);

/*Table structure for table `fotopuntoventa` */

DROP TABLE IF EXISTS `fotopuntoventa`;

CREATE TABLE `fotopuntoventa` (
  `idFotoPuntoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFotoPuntoVenta` char(100) DEFAULT NULL,
  `idPuntoVenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFotoPuntoVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fotopuntoventa` */

insert  into `fotopuntoventa`(`idFotoPuntoVenta`,`nombreFotoPuntoVenta`,`idPuntoVenta`) values (1,'imagen1.jpg',1),(2,'imagen2.jpg',1);

/*Table structure for table `idioma` */

DROP TABLE IF EXISTS `idioma`;

CREATE TABLE `idioma` (
  `idIdioma` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `PrefIdioma` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `NombreIdioma` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `EstadoIdioma` int(11) DEFAULT NULL,
  `FlagDefaultIdioma` int(11) DEFAULT NULL,
  `icono` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `idioma` */

insert  into `idioma`(`idIdioma`,`PrefIdioma`,`NombreIdioma`,`EstadoIdioma`,`FlagDefaultIdioma`,`icono`) values (1,'fr','frances',1,1,'cv.png'),(2,'en','ingles',1,0,'ax.png');

/*Table structure for table `idiomatiposite` */

DROP TABLE IF EXISTS `idiomatiposite`;

CREATE TABLE `idiomatiposite` (
  `idIdiomaSite` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoSite` int(11) DEFAULT NULL,
  `idIdioma` int(11) DEFAULT NULL,
  `nombreIdiomaTipoSite` char(200) DEFAULT NULL,
  PRIMARY KEY (`idIdiomaSite`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `idiomatiposite` */

insert  into `idiomatiposite`(`idIdiomaSite`,`idTipoSite`,`idIdioma`,`nombreIdiomaTipoSite`) values (1,1,1,'SITE INTERNET'),(2,1,2,'WEBSITE'),(3,2,1,'BLOG'),(4,2,2,'BLOG');

/*Table structure for table `imgproducto` */

DROP TABLE IF EXISTS `imgproducto`;

CREATE TABLE `imgproducto` (
  `idImagen` int(10) NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) NOT NULL,
  `descripcion` text,
  `imagen` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `imgproducto` */

insert  into `imgproducto`(`idImagen`,`idProducto`,`descripcion`,`imagen`) values (1,1,'esta \r\nmesa es lo maximo','1.jpg'),(2,1,'mejor performance','2.jpg'),(3,1,'mayor estabilidad','3.jpg'),(4,2,'buena muy buena estructura','4.jpg'),(5,2,'no hay mejor \r\nque esta \r\nestructura','5.jpg');

/*Table structure for table `imgproductoidioma` */

DROP TABLE IF EXISTS `imgproductoidioma`;

CREATE TABLE `imgproductoidioma` (
  `idImagenIdioma` int(10) NOT NULL AUTO_INCREMENT,
  `idImagen` int(10) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`idImagenIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `imgproductoidioma` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `idMenuBase` int(11) DEFAULT NULL,
  `nombreMenu` char(20) DEFAULT NULL,
  `idIdioma` int(5) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`idMenu`,`idMenuBase`,`nombreMenu`,`idIdioma`) values (1,1,'Accueil',1),(2,1,'Welcome',2),(3,2,'arty fragrance',1),(4,2,'arty fragrance',2),(5,3,'collections',1),(6,3,'collections',2),(7,4,'contact',1),(8,4,'contan',2),(9,5,'elisabeth de feydeau',1),(10,5,'elisabeth de feydeau',2),(11,6,'mecenat versailles',1),(12,6,'patronage versailles',2),(13,7,'points de vente',1),(14,7,'outlets',2),(15,8,'presse',1),(16,8,'press',2),(17,9,'blog',1),(18,9,'blog',2),(19,10,'recomanderle site',1),(20,10,'recommend the site',2),(21,11,'liens-amis',1),(22,11,'friends links',2),(23,12,'credits',1),(24,12,'credits',2),(25,13,'mentions-legales',1),(26,13,'legal notices',2),(27,14,'presentacion',1),(28,14,'presentacion',2),(29,15,'Charte qualité',1),(30,15,'Charte qualité',2),(31,16,'Précautions d’usag',1),(32,16,'Précautions d’usag',2),(33,17,'Commandes spéciales',1),(34,17,'Commandes spéciales',2),(35,18,'actualites',1),(36,18,'actualites',2),(37,19,'liens Amis',1),(38,19,'liens Amis',2),(39,20,'Biographie',1),(40,20,'Biographie',2),(41,21,'Ouvrages',1),(42,21,'Ouvrages',2),(43,22,'Realisations',1),(44,22,'Realisations',2),(45,23,'Blog Et Photos',1),(46,23,'Blog Et Photos',2);

/*Table structure for table `menubase` */

DROP TABLE IF EXISTS `menubase`;

CREATE TABLE `menubase` (
  `idMenuBase` int(11) NOT NULL AUTO_INCREMENT,
  `rutaMenuBase` char(50) DEFAULT NULL,
  `slugMenuBase` char(20) DEFAULT NULL,
  `nombreMenuBase` char(50) DEFAULT NULL,
  `idModulo` smallint(5) unsigned DEFAULT NULL,
  `idTipoMenu` int(11) DEFAULT NULL,
  `rutaMenuAdmin` char(50) DEFAULT NULL,
  `fotoMenu` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idMenuBase`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `menubase` */

insert  into `menubase`(`idMenuBase`,`rutaMenuBase`,`slugMenuBase`,`nombreMenuBase`,`idModulo`,`idTipoMenu`,`rutaMenuAdmin`,`fotoMenu`) values (1,'accueil','accueil','accueil',1,1,'index/accueil',NULL),(2,'arty-fragance','arty-fragance','arty-fragance',1,1,NULL,NULL),(3,'collections','collections','collections',1,NULL,'index/collections',NULL),(4,'contact','contact','contact',1,NULL,NULL,NULL),(5,'elisabeth-de-feydeau','elisabeth-de-feydeau','elisabeth-de-feydeau',1,NULL,NULL,NULL),(6,'mecenat-versailles','mecenat-versailles','mecenat-versailles',1,NULL,NULL,NULL),(7,'points-de-vente','points-de-vente','points-de-vente',1,NULL,'pointventa/index',NULL),(8,'presse','presse','presse',1,NULL,NULL,NULL),(9,'blog','blog','blog',2,NULL,NULL,NULL),(10,'recomanderle-site','recomanderle-site','recomanderle-site',2,NULL,NULL,NULL),(11,'liens-amis','liens-amis','liens-amis',3,NULL,NULL,NULL),(12,'credits','credits','credits',3,NULL,NULL,NULL),(13,'mentions-legales','mentions-legales','mentions-legales',3,NULL,NULL,NULL),(14,'presentacion-14','presentacion','presentacion',4,1,NULL,NULL),(15,'charte-qualite-15','charte-qualite','charte-qualite',4,1,NULL,NULL),(16,'precautions-d-usag-16','precautions-d-usag','Précautions d’usag',4,1,NULL,NULL),(17,'commandes-speciales-17','commandes-speciales','Commandes spéciales',4,1,NULL,NULL),(18,'actualites','actualites','actualites',4,2,NULL,NULL),(19,'','liens-amis','liens-amis',5,2,NULL,NULL),(20,'','biographie','Biographie',6,2,NULL,NULL),(21,'ouvrages','ouvrages','Ouvrages',6,2,NULL,NULL),(22,'realisations','realisations','Realisations',6,2,NULL,NULL),(23,'blog-et-photos','blog-et-photos','Blog Et Photos',6,2,NULL,NULL);

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `idModulo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombreModulo` char(50) DEFAULT NULL,
  `idTipoModulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `modulo` */

insert  into `modulo`(`idModulo`,`nombreModulo`,`idTipoModulo`) values (1,'MenuSuperior',NULL),(2,'MenuFooter1',NULL),(3,'MenuFooter2',NULL),(4,'Arty Fragrance',NULL),(5,'Liens Amis',NULL),(6,'Elisabeth De Feydeau',NULL);

/*Table structure for table `obra` */

DROP TABLE IF EXISTS `obra`;

CREATE TABLE `obra` (
  `idObra` int(11) NOT NULL AUTO_INCREMENT,
  `tituloObra` text,
  `parrafoObra` text,
  `link` text,
  PRIMARY KEY (`idObra`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `obra` */

insert  into `obra`(`idObra`,`tituloObra`,`parrafoObra`,`link`) values (1,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','/'),(2,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','/');

/*Table structure for table `obraidioma` */

DROP TABLE IF EXISTS `obraidioma`;

CREATE TABLE `obraidioma` (
  `idObraIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `tituloObraIdioma` text,
  `parrafoObraIdioma` text,
  `idObra` int(11) DEFAULT NULL,
  `idIdioma` int(11) DEFAULT NULL,
  PRIMARY KEY (`idObraIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `obraidioma` */

insert  into `obraidioma`(`idObraIdioma`,`tituloObraIdioma`,`parrafoObraIdioma`,`idObra`,`idIdioma`) values (1,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',1,1),(2,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',1,2),(3,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',2,1),(4,'<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>','<h3>2011</h3>\r\n<p>\r\nLes Parfums : dictionnaire, anthologie, histoire\r\n<br>\r\nOuvrage complet\r\n<br>\r\n(éditions R. Laffont)\r\n</p>',2,2);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePais` char(200) DEFAULT NULL,
  `slugPais` char(200) DEFAULT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`idPais`,`nombrePais`,`slugPais`) values (1,'Francia','francia'),(2,'Belgica','belgica'),(3,'Core du sur','core-du-sur');

/*Table structure for table `paisidioma` */

DROP TABLE IF EXISTS `paisidioma`;

CREATE TABLE `paisidioma` (
  `idPaisIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaisIdioma` char(100) DEFAULT NULL,
  `idIdioma` int(11) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaisIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `paisidioma` */

insert  into `paisidioma`(`idPaisIdioma`,`nombrePaisIdioma`,`idIdioma`,`idPais`) values (1,'Francia',1,1),(2,'Francia',2,1),(3,'Belgica',1,2),(4,'Belgica',2,2),(5,'Core du sur',1,3),(6,'Core du sur',2,3);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idProducto` int(10) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nombreLargo` varchar(200) NOT NULL,
  `slugProducto` char(150) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` char(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificacion` date DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

insert  into `producto`(`idProducto`,`idCategoria`,`nombre`,`nombreLargo`,`slugProducto`,`descripcion`,`estado`,`fechaCreacion`,`fechaModificacion`) values (1,1,'Mesaa 1','Mesaa 1 realmente buena','mesa-buena','mesa elaborada con la mas fina estampa	\r\ny materiales','1','2012-02-29','2012-02-29'),(2,1,'Messa 2','Messa 2 excelente','mesa-excelente','lo mejor de\r\ntodo es que\r\naqui se tiene','1','2012-02-29','2012-12-29');

/*Table structure for table `productoidioma` */

DROP TABLE IF EXISTS `productoidioma`;

CREATE TABLE `productoidioma` (
  `idProductoIdioma` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `nombreLargo` varchar(200) NOT NULL,
  `slugProducto` char(150) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`idProductoIdioma`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `productoidioma` */

/*Table structure for table `puntoventa` */

DROP TABLE IF EXISTS `puntoventa`;

CREATE TABLE `puntoventa` (
  `IdPuntoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `idPais` int(11) DEFAULT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  `nombrePuntoVenta` char(100) DEFAULT NULL,
  `direccionPuntoVenta` char(200) DEFAULT NULL,
  `direccionWebPuntoVenta` char(200) DEFAULT NULL,
  `telefonoPuntoVenta` char(200) DEFAULT NULL,
  PRIMARY KEY (`IdPuntoVenta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `puntoventa` */

insert  into `puntoventa`(`IdPuntoVenta`,`idPais`,`idCiudad`,`nombrePuntoVenta`,`direccionPuntoVenta`,`direccionWebPuntoVenta`,`telefonoPuntoVenta`) values (1,1,1,'Boutique Jovoy','29, rue Danielle Casanova','www.jovoy.com','123 23 234'),(2,1,1,'Boutique Jovoy2','29, rue Danielle Casanova','www.jovoy1.com','123 234 12');

/*Table structure for table `puntoventaidioma` */

DROP TABLE IF EXISTS `puntoventaidioma`;

CREATE TABLE `puntoventaidioma` (
  `idPuntoVentaIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `idPuntoVenta` int(11) DEFAULT NULL,
  `nombrePuntoVenta` char(100) DEFAULT NULL,
  `idIdioma` int(11) DEFAULT NULL,
  `direccionWebPuntoVenta` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idPuntoVentaIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `puntoventaidioma` */

insert  into `puntoventaidioma`(`idPuntoVentaIdioma`,`idPuntoVenta`,`nombrePuntoVenta`,`idIdioma`,`direccionWebPuntoVenta`) values (1,1,'Boutique Jovoy',1,NULL),(2,1,'Boutique Jovoy',2,NULL),(3,2,'Boutique Jovoy2',1,NULL),(4,2,'Boutique Jovoy2',2,NULL);

/*Table structure for table `site` */

DROP TABLE IF EXISTS `site`;

CREATE TABLE `site` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSite` char(100) DEFAULT NULL,
  `urlSite` text,
  `urlMostrar` char(200) DEFAULT NULL,
  `idTipoSite` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `site` */

insert  into `site`(`idSite`,`nombreSite`,`urlSite`,`urlMostrar`,`idTipoSite`,`estado`) values (1,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(2,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(3,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(4,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',1,1),(5,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1),(6,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1),(7,'ambre gris','http://www.ambregris.fr','http://www.ambregris.fr',2,1);

/*Table structure for table `tipomenu` */

DROP TABLE IF EXISTS `tipomenu`;

CREATE TABLE `tipomenu` (
  `idTipoMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoMenu` char(100) DEFAULT NULL,
  PRIMARY KEY (`idTipoMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipomenu` */

insert  into `tipomenu`(`idTipoMenu`,`nombreTipoMenu`) values (1,'pagina'),(2,'modulo'),(3,'url Externa'),(4,'url Interna');

/*Table structure for table `tiposite` */

DROP TABLE IF EXISTS `tiposite`;

CREATE TABLE `tiposite` (
  `idTipoSite` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoSite` char(50) DEFAULT NULL,
  PRIMARY KEY (`idTipoSite`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tiposite` */

insert  into `tiposite`(`idTipoSite`,`nombreTipoSite`) values (1,'SITE INTERNET'),(2,'BLOG');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidopaterno` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidomaterno` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT '1',
  `estado` int(11) DEFAULT '1',
  `login` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FlagSuperUsuario` int(1) DEFAULT '0',
  `idcliente` int(11) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`idusuario`,`nombre`,`apellidopaterno`,`apellidomaterno`,`idtipousuario`,`estado`,`login`,`password`,`telefono`,`correo`,`FlagSuperUsuario`,`idcliente`,`dni`,`direccion`) values (1,'marcelo','carranza','torres',1,1,'marrselo@gmail.com','123123','22312223','marrselo@gmail.com',1,NULL,10104587,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
