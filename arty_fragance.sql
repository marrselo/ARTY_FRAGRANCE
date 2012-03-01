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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `articulo` */

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

insert  into `core_session`(`Id`,`save_path`,`name`,`Modified`,`LifeTime`,`Data`) values ('43fb8961c3bb339db7503932227f9c64','','',1330357817,1440,'CFk6dkJtDoTAm9jxGQEi3g-Sr9E8GVaLdWsU3aQxsLxH7qasBB4UawxynqFftlsZGy8kVOiz_Pz4UFNk4akfqggC4N-a9VxBhhxCP8NjDRkYyKv3mFa3GYseRqKueFj0pgkcfI1HExGXvAfsS2y0Isvl8e2dKFeSRGPmz1-LcIkYZE79mdlp17VGdr892F9cuboogQdtALfgjiwVH1pCZO4wPsUtFSGcFe9Fu2fXYAQJq_nTQoPqO5WqiFl8OY2EAYI__zw2dUkFtfZyHb4kV6pFahgLWerSCmfq8NKCMRGskw3nlGGSNJPFZX-nne7cfRkKdj67f6VYy3QoDAviGA6o2SLUl-UkgPVIh7BW4Qm5_C4JNp6_SqSSarv_T7azBTLbBKDNiFqeZjWzyJj0kSRLBcoenl0K18m721jVxmThNF2vSjVV15DoPjBqQKBJF7q1ofs9t6D2kpoGJcBwZ2VnvixHSmwF5GIBW35NAOtnpQyPQpM_nQUBRKZfGmw8UhlKOSDst6PKl_4-sju9h7U8OytFJg1gavkVrQuO8bEimFWajrU1BBB2GnN3lclCT3RwIQpazRiuviEL4Ib1Ew..'),('6bef30f25af2f786ccf62a9b1499eb3e','','',1330363701,1440,'vRMYzmu08sty6tEstG5eV5tqB2UV49Ve4CfTxmd9d4Ktk2Vut7CH9lKz5hIOtn4vp_G4qbgsYZUVqtxQImUNTYVb4CxD_nCSnEALv8jvu4aVjhLZOXpHTkqJIgmxiromkz1wcsEUHduZ7AFE4LFN-tJL201dbMNrk05HB2tFwfaQT7gbCIpd6m_ZkhiWrITPP7vuQi4y1d5iLMX24W1fkB_LPX4QVM1UTA93pesQC9fK4xSBj8xNtOKENI30780A5hsjWwNdWABbjCzRktHCWx-6WZRIBq4oGJnaNSwcv1bKXLdX-8BXB9ZPQtNrQBMN8HwLNhWddSc4srC0JSwhy1BQTyhf4vwjFcMurZNGkleHa8fjvHvwv8QH2ue-DWIZ1Hx4_scizzlzkQmi-PQFYJYFvFCD3HbG0mWKb9oi3ifEK1dmDCelWqk8r2p3sGVXbzOeba3C0-kvTp2sSk2EtxRlNA2joxaWjAJQgxXjSEr1_3u3baEzqBjOB_rXzU9P8s6inq_eD4Y0nGPTUb_sWzgmQRJjOO1kVJXwf4IbQx4upqnwIhJUzAZ9UfGbdvXxIsUNWhU6fMsMa_u63QCVgA..'),('3c923ebaae03c9bd6a7a0702a827542f','','',1330359098,1440,''),('a9fd25590e52be2a3528289205a6ae2f','','',1330359722,1440,'CFk6dkJtDoTAm9jxGQEi3g-Sr9E8GVaLdWsU3aQxsLxH7qasBB4UawxynqFftlsZGy8kVOiz_Pz4UFNk4akfqggC4N-a9VxBhhxCP8NjDRkYyKv3mFa3GYseRqKueFj0pgkcfI1HExGXvAfsS2y0Isvl8e2dKFeSRGPmz1-LcIkYZE79mdlp17VGdr892F9cuboogQdtALfgjiwVH1pCZO4wPsUtFSGcFe9Fu2fXYAQJq_nTQoPqO5WqiFl8OY2EAYI__zw2dUkFtfZyHb4kV6pFahgLWerSCmfq8NKCMRGskw3nlGGSNJPFZX-nne7cfRkKdj67f6VYy3QoDAviGA6o2SLUl-UkgPVIh7BW4Qm5_C4JNp6_SqSSarv_T7azBTLbBKDNiFqeZjWzyJj0kSRLBcoenl0K18m721jVxmThNF2vSjVV15DoPjBqQKBJF7q1ofs9t6D2kpoGJcBwZ2VnvixHSmwF5GIBW35NAOtnpQyPQpM_nQUBRKZfGmw8UhlKOSDst6PKl_4-sju9h7U8OytFJg1gavkVrQuO8bEimFWajrU1BBB2GnN3lclCT3RwIQpazRiuviEL4Ib1Ew..'),('7a8u2n522vjboab4ldqc62qc01','','',1330410235,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}CESecurity|s:320:\"MzAwfDEwMDAwfDEwMDB8MTAwMHwxMDAwfC9VcGxvYWRzfC9VcGxvYWRzfC9VcGxvYWRzfC9UZW1wbGF0ZXN8L1VwbG9hZHN8dHJ1ZXx0cnVlfHRydWV8dHJ1ZXwuanBnLC5qcGVnLC5naWYsLnBuZ3wuYXZpLC5tcGcsLm1wZWcsLm1wMywud2F2LC53bXZ8LnR4dCwuZG9jLC5wZGYsLnppcCwucmFyLC5hdmksLm1wZywubXBlZywuanBnLC5qcGVnLC5naWYsLnBuZywuaHRtfC5odG1sLC5odG18ZW4tZW58fHx8fHxmYWxzZXw=\";'),('513c7cf2f26b9b7b4ee0c20965cfd31a','','',1330399869,1440,''),('51c8dc8e603dbefbc62031bede25e6d6','','',1330399870,1440,''),('8725fa3c24c7b9c982bbaddb9fb3807c','','',1330407857,1440,''),('5007bfd27d7938e918533ce8735e8e02','','',1330400146,1440,''),('f5fkpp88f32cdt6tabcpk33ci1','','',1330407642,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('3d87f07f9c863d98219f374e2cdce115','','',1330407992,1440,''),('vh8lo9ncakbqka4b1m1upo9ga3','','',1330434393,1440,''),('4a2ce0137b9d054494a04b246e80e5b7','','',1330471502,1440,''),('ab254b0638f8242da3d30b6fd153da3b','','',1330471507,1440,''),('8f902872e976c9ff0e31d1857159c7c0','','',1330471583,1440,''),('89mqfhhnkt4fd8tmvql20hndj7','','',1330607721,1440,''),('860b37ff2face8a4282c3f8484d0d96a','','',1330484021,1440,''),('j5e2fb4mke9prcc6p8n7ptivq7','','',1330516010,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('0s14pah7dgufkmot5638egr0j7','','',1330488924,1440,''),('719a9188cbe9deb1c55decad5d59020f','','',1330488601,1440,''),('e58eb8049ee124c3c1098ef761aec7c7','','',1330500564,1440,'2wVZhki5dZtIOIoWWBiyp_moL-nBmUCeO0l6iXgmiM3XV8t-XKC1_8yfIDb444OU4TIUbaVOj6f2hpYDnymW9gLAX0q6Vib9nsea1rGSDaZ1_GT45QYe1VaWWbF3vVDlWUlOYP2xWLMC7OERZeezFYywcqi8XTtdTUfzfHTryQqDH2GIe5yWGRs_Kq_cxKzbMc56avKTgyqNVn0vs9p8sc72Dc1GzGD2LJLXcOJJBapnkJTOw_vqydpVr8OynjGq1d91jvEsuamsDqu5w1lAIx8TKQL1FoKfKf4NmUAWeGfIlsZzlO_zUIVniTjIkOmlCYAQYolbNbOAGYNLQ9a3UJVTyeQhBFFQGTlYpIbuF2ktsHKEhZqlpu4Yf5yJWjvZJdIsqGIxvjkq5MrQsK3rV0ydAjPuBHubDZtdd_esr2a4GxFcmlJIMkGZo-mfe6JdmG3tb3uoU8iPKSPpRMusjH5DKqe-2jKLK98Y_gRBBiTE5dx-6TbFDPj38_nKl3Jhn9ALt-TmfKrKGxAditKrfWnL7UfFMizzA28MpIq3-a_7c7dbAfq3y-vg5nHCIDQtZOpJTHueXfgeH8F7RQAI5w..'),('feb5d500141bae6abf40f429ee407b6f','','',1330506504,1440,''),('89b4e1d1b5d0ffc1fe1521c9223af648','','',1330533456,1440,'yEqyj5FJQ27z9Gdks5WJl_-adpChlJmRbqUCzGWicPIFaNh7PH1GRKZbTWTz0buxcPsHIkYTrxx2uiHSWgz_nE8S1ZXK4dwoRj3AVtgNORogg1qimZ81EgOJqD3OI8HH9cUiiyFPU4hU5fHc4LgsaQfnApdm-ypUkTcXnkkcjXqU9yc7tzy5zhaN-NQh14wGGxN6vthiYGMYUAsOzRRuam359iTwyn0Y0I95mQvRDq8PV96wyLXQu9WLIw2rbVFeIPDv8Tr9L7c2qbQiC8W7afrqkslqNCjlI7zg53LXEAe3ro7yDRrLfWhVm9mfgayNe9mPHbs0ivZpuneVsMOKARuDYWPIYBtMyZKpWeWu-XcAqZL16R_5Mtq21X8JgG9-i6yIV23b9tM1ujfugpP5NURMUgPt9zxjET4s7SOQ_5tJgt2Gv7lgeb2ThT4PYoSJTkHNtszcdF4AzmEM1_jfKyY8uWSxwZ5tZxBxFPibVrDGzLPvjnKChmUIUb_Fg-QB3rd-g9eTu-B8CzYKOFs8rm7HmEJJE6UYQCrYaSxPzXl3wSia0LXkdb-E1c_pc9PiqPrBtatTbWOVcSJcaEDxaQ..'),('cca51b77475f20e24d7a528174748953','','',1330529911,1440,''),('5bfd743466aa3a78dce295cf6a5b44f5','','',1330554250,1440,''),('a44ee6b6359785982bdb772062c82ce8','','',1330554766,1440,''),('6ep5mktec2lau4b6g3vavcd366','','',1330569894,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('9974dabd9d1b6007191d19ee8fc2517b','','',1330569582,1440,'0gFIDfO-V8gSRGm2lLL5BE1vS_47kRZAyzh8l-JLGPwoEBsHE2kyBRWrUk6zYgwQtzm-fyd6BonxfZ_z7gBS-6gbIQm4-tMHsGkGFovx0Ysp_6o9BRsZc_EfIH-AIyONTYbPKMlYJr8ubyLbKeB0mYlaARx0CIzZxO1-jS6DFzZTIShuDCPkgLtLE05cWm5fV0NC5mCtegPnEEqSmIzZIoV4rsiAeSarQp7Z5MH_WkS4xvGz2z_DZ9pCjOlG01c0QWlLXFmJbkXVp2-5LbPDIJya1hK111-iCcENR15C3oE_ncvXPeNPkfnoURHtoRx70v7KJawBn08GiNZogbQp9d7qFkgBz8YXIb2wjOES848tUHQJbpsopgSbz7NA7ZGN7R8H-86ci7eJN-h2Ww9xWEUvJ0xfqygFBhZ57fpkOs4r3cPFtry4wmlVHnG0VvOqaDTVQ1Hz_AHOaOl3U_6F5FbYINxf7jI36Zagt7un-MwI0YM7Am7ph4ZLsHdat2r8JcwpMbGGmZYRPa9GzPGeDk4-fGWA6ZYGOS0dBnAL9RXMbDgMhe05MxH8y1ZQCLhUHZyjQz7iYCd5fGtoBrByTA..'),('b7fkie686vlmsc7guq6mnkfmk6','','',1330570475,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('b98f6b7192ad74722c88aaefd506f940','','',1330569650,1440,'0gFIDfO-V8gSRGm2lLL5BE1vS_47kRZAyzh8l-JLGPwoEBsHE2kyBRWrUk6zYgwQtzm-fyd6BonxfZ_z7gBS-6gbIQm4-tMHsGkGFovx0Ysp_6o9BRsZc_EfIH-AIyONTYbPKMlYJr8ubyLbKeB0mYlaARx0CIzZxO1-jS6DFzZTIShuDCPkgLtLE05cWm5fV0NC5mCtegPnEEqSmIzZIoV4rsiAeSarQp7Z5MH_WkS4xvGz2z_DZ9pCjOlG01c0QWlLXFmJbkXVp2-5LbPDIJya1hK111-iCcENR15C3oE_ncvXPeNPkfnoURHtoRx70v7KJawBn08GiNZogbQp9d7qFkgBz8YXIb2wjOES848tUHQJbpsopgSbz7NA7ZGN7R8H-86ci7eJN-h2Ww9xWEUvJ0xfqygFBhZ57fpkOs4r3cPFtry4wmlVHnG0VvOqaDTVQ1Hz_AHOaOl3U_6F5FbYINxf7jI36Zagt7un-MwI0YM7Am7ph4ZLsHdat2r8JcwpMbGGmZYRPa9GzPGeDk4-fGWA6ZYGOS0dBnAL9RXMbDgMhe05MxH8y1ZQCLhUHZyjQz7iYCd5fGtoBrByTA..'),('budv6s0m753acu1lg0vaad2go4','','',1330570387,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('1ed2b9a3fd6b7bdba6eee7c44593a380','','',1330570028,1440,''),('tm7obs4v2tjr9vd1f85l2ea3q2','','',1330570419,1440,''),('p4he73b1tvigtcndj2082ro994','','',1330570445,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('5af54e70ffe062ac8f1270dba469edc3','','',1330570289,1440,''),('oak16qcuult6kqvsjijk84lfu4','','',1330584123,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('o5j2ii1fnci94r0uqho3dk7cr1','','',1330570582,1440,''),('q8fldkhf3gmnmtoaqtbln4a9f0','','',1330570600,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('4mb5edm69gm3f77rsgcb0obpt4','','',1330579189,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('16cf84092293703cf745c5160bd73e25','','',1330571198,1440,''),('9ub5cmhbkhgigvu58rgjj6td83','','',1330579315,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('fafln4k4kmtj2s2idij2sdg6u4','','',1330607462,1440,'Zend_Auth|a:1:{s:7:\"storage\";O:8:\"stdClass\":13:{s:9:\"idusuario\";s:1:\"1\";s:6:\"nombre\";s:7:\"marcelo\";s:15:\"apellidopaterno\";s:8:\"carranza\";s:15:\"apellidomaterno\";s:6:\"torres\";s:13:\"idtipousuario\";s:1:\"1\";s:6:\"estado\";s:1:\"1\";s:5:\"login\";s:18:\"marrselo@gmail.com\";s:8:\"telefono\";s:8:\"22312223\";s:6:\"correo\";s:18:\"marrselo@gmail.com\";s:16:\"FlagSuperUsuario\";s:1:\"1\";s:9:\"idcliente\";N;s:3:\"dni\";s:8:\"10104587\";s:9:\"direccion\";N;}}'),('hn0ki117k4ldgpldll1ikkf326','','',1330608744,1440,''),('886632kfjqikpir48aqctoemf0','','',1330580588,1440,''),('ca3ea14cf1905dfd49e5fef029d03c99','','',1330586410,1440,'p3Df-Aua--pLhw4GHBUq1i57_4W5YIRAlipLikHpX5i8DvGBpOBxTjiODguDERkK2FO2aNUPFd-tf1FRg8A09x8w-Lm1BTURcmeAcbUROMG6yjVlBsO_G2ToO29dmWskEQ8rCn8QiqL_ymt5flYuWjZUCbnMtU_VtPxeXK2Jy45RbHQNPoXPKMHVVrAjZBO9nKnLaW2_aj2GOyw2MenVOr0RSRa7wkccHf-wqk8oWvAbxagWV2cHiiUWoSkXr4307YyQ2FKFjTeylqUpLxLz4lfM1RvqV6pzr6gD_RQamVvTVVzdvVCq-2Q7fFbGa-RbZdDigH9OJBqtOO02I5jqWCtqGfiz_iuFN33Pqgf6L8vrj7-y8w1I-jbIyShITOGkN3JAA9XXPl2YX3eSWgkqrc4rOyV6sxmru9UZzYa3XzIHsUruGuXVPAzWJTzevLdR3gwOpjLblsWlkK0YKwm-L7BWskx7oe4LG5Wx8aChJ38DpsmB9mOiK3Ibu7rY5cNdKtEz9QoYP9T8tQ6ulm4QdVqWbVwyXEi9z-JAHFrUuHAmENOD0UFwjJQ3pARcqt5gk8idaqPVWE7icZAd-UQ0Xg..'),('5e8e8fb783a0766be1bc120a7930e56c','','',1330590865,1440,''),('9770f3bf7a95d55b24c12ff5a377955e','','',1330605659,1440,'');

/*Table structure for table `detalleArticulo` */

DROP TABLE IF EXISTS `detalleArticulo`;

CREATE TABLE `detalleArticulo` (
  `idDetalleArticulo` int(10) unsigned NOT NULL auto_increment,
  `idArticulo` int(10) unsigned default NULL,
  `tituloDetalle` varchar(250) default NULL,
  `parrafoDetalle` text character set utf8,
  `fotoPrincipalDetalle` varchar(250) character set utf8 default NULL,
  `slugDetalle` char(100) character set utf8 default NULL,
  PRIMARY KEY  (`idDetalleArticulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detalleArticulo` */

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `fotoBio` */

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

insert  into `idioma`(`idIdioma`,`PrefIdioma`,`NombreIdioma`,`EstadoIdioma`,`FlagDefaultIdioma`,`icono`) values (1,'fr','frances',1,1,NULL),(2,'en','ingles',1,0,NULL);

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

insert  into `menubase`(`idMenuBase`,`rutaMenuBase`,`slugMenuBase`,`nombreMenuBase`,`idModulo`,`idTipoMenu`,`rutaMenuAdmin`,`fotoMenu`) values (1,'accueil','accueil','accueil',1,1,'index/accueil',NULL),(2,'arty-fragance','arty-fragance','arty-fragance',1,1,NULL,NULL),(3,'collections','collections','collections',1,NULL,'index/collections',NULL),(4,'contact','contact','contact',1,NULL,NULL,NULL),(5,'elisabeth-de-feydeau','elisabeth-de-feydeau','elisabeth-de-feydeau',1,NULL,NULL,NULL),(6,'mecenat-versailles','mecenat-versailles','mecenat-versailles',1,NULL,NULL,NULL),(7,'points-de-vente','points-de-vente','points-de-vente',1,NULL,NULL,NULL),(8,'presse','presse','presse',1,NULL,NULL,NULL),(9,'blog','blog','blog',2,NULL,NULL,NULL),(10,'recomanderle-site','recomanderle-site','recomanderle-site',2,NULL,NULL,NULL),(11,'liens-amis','liens-amis','liens-amis',3,NULL,NULL,NULL),(12,'credits','credits','credits',3,NULL,NULL,NULL),(13,'mentions-legales','mentions-legales','mentions-legales',3,NULL,NULL,NULL),(14,'presentacion-14','presentacion','presentacion',4,1,NULL,NULL),(15,'charte-qualite-15','charte-qualite','charte-qualite',4,1,NULL,NULL),(16,'precautions-d-usag-16','precautions-d-usag','Précautions d’usag',4,1,NULL,NULL),(17,'commandes-speciales-17','commandes-speciales','Commandes spéciales',4,1,NULL,NULL),(18,'actualites','actualites','actualites',4,2,NULL,NULL),(19,'','liens-amis','liens-amis',5,2,NULL,NULL),(20,'','biographie','Biographie',6,2,NULL,NULL),(21,'ouvrages','ouvrages','Ouvrages',6,2,NULL,NULL),(22,'realisations','realisations','Realisations',6,2,NULL,NULL),(23,'blog-et-photos','blog-et-photos','Blog Et Photos',6,2,NULL,NULL);

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
  `direccionPuntoVenta` char(200) default NULL,
  `idIdioma` int(11) default NULL,
  PRIMARY KEY  (`idPuntoVentaIdioma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `puntoventaIdioma` */

insert  into `puntoventaIdioma`(`idPuntoVentaIdioma`,`idPuntoVenta`,`nombrePuntoVenta`,`direccionPuntoVenta`,`idIdioma`) values (1,1,'Boutique Jovoy','29, rue Danielle Casanova',1),(2,1,'Boutique Jovoy','29, rue Danielle Casanova',2),(3,2,'Boutique Jovoy2','29, rue Danielle Casanova',1),(4,2,'Boutique Jovoy2','29, rue Danielle Casanova',2);

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
