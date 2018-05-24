DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idadmin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `password` varchar(3000) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `idpost` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) NOT NULL,
  `title` varchar(110) NOT NULL,
  `category` varchar(120) NOT NULL,
  `h1` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  `imgalt` varchar(100) NOT NULL,
  `imgsrc` varchar(2048) NOT NULL,
  `url` varchar(2048) NOT NULL,
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `top`;
CREATE TABLE `top` (
  `idtop` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(120),
  `top` int(10) unsigned,
  `idpost` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idtop`),
  KEY `idMembers_idx` (`idpost`),
  CONSTRAINT `idpost` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `picbox`;
CREATE TABLE `picbox` (
  `idpic` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `h1` varchar(60) NOT NULL,
  `imgalt` varchar(100) NOT NULL,
  `imgsrc` varchar(2048) NOT NULL,
  PRIMARY KEY (`idpic`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `twitter`;
CREATE TABLE `twitter` (
  `idtwitter` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(120) NOT NULL,
  `logoalt` varchar(100) NOT NULL,
  `logosrc` varchar(2048) NOT NULL,
  PRIMARY KEY (`idtwitter`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE `pdf` (
  `idpdf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(2048) NOT NULL,
  `h1` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  PRIMARY KEY (`idpdf`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `idpartners` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `h1` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  `logoalt` varchar(100) NOT NULL,
  `logosrc` varchar(2048) NOT NULL,
  PRIMARY KEY (`idpartners`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `idairlines` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `airlines` varchar(120) NOT NULL,
  `course` varchar(500) NOT NULL,
  `price` varchar(40) NOT NULL,
  `date` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  PRIMARY KEY (`idairlines`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


INSERT INTO `admin`(
  `login`,
  `password`
)
VALUES(
  'admin',
  'admin'
)
;
