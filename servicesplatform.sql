/*
SQLyog Community Edition- MySQL GUI v8.12 
MySQL - 5.0.67 : Database - servicesplatform
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`servicesplatform` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `servicesplatform`;

/*Table structure for table `directories` */

DROP TABLE IF EXISTS `directories`;

CREATE TABLE `directories` (
  `dirID` bigint(10) unsigned NOT NULL auto_increment,
  `name` char(20) character set utf8 NOT NULL,
  `offline` int(10) NOT NULL default '0',
  `userID` varchar(150) character set utf8 NOT NULL,
  `public` int(10) default '0',
  PRIMARY KEY  (`dirID`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `docTitle` */

DROP TABLE IF EXISTS `docTitle`;

CREATE TABLE `docTitle` (
  `lang` char(2) NOT NULL,
  `docTitle` varchar(1000) NOT NULL,
  `docID` varchar(100) NOT NULL,
  PRIMARY KEY  (`lang`,`docID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `docID` varchar(100) character set utf8 NOT NULL,
  `srcID` varchar(100) character set utf8 NOT NULL,
  `authors` longtext character set utf8 NOT NULL,
  `serial` varchar(200) character set utf8 NOT NULL,
  `keywords` longtext character set utf8,
  `year` varchar(4) character set utf8 default NULL,
  `number` varchar(10) character set utf8 default NULL,
  `volume` varchar(10) character set utf8 default NULL,
  `suppl` varchar(50) character set utf8 default NULL,
  `publication_date` varchar(22) character set utf8 default NULL,
  `process_date` varchar(22) character set utf8 default NULL,
  `docURL` varchar(1000) character set utf8 NOT NULL,
  `title` varchar(500) default NULL,
  PRIMARY KEY  (`docID`,`srcID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `profileID` bigint(10) unsigned NOT NULL auto_increment,
  `userID` varchar(150) character set utf8 NOT NULL default '0',
  `sysUID` int(10) unsigned default '0',
  `profileText` varchar(150) character set utf8 NOT NULL default '',
  `profileName` varchar(25) character set utf8 NOT NULL default '',
  `profileStatus` char(3) character set utf8 NOT NULL default '',
  `profileDefault` tinyint(1) NOT NULL default '0',
  `creationDate` datetime NOT NULL default CURRENT_TIMESTAMP,
  `id_grande_area` int(10) unsigned default '0',
  `id_sub_area` int(10) unsigned default '0',
  PRIMARY KEY  (`profileID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `userLinks` */

DROP TABLE IF EXISTS `userLinks`;

CREATE TABLE `userLinks` (
  `linkID` bigint(10) unsigned NOT NULL auto_increment,
  `url` varchar(200) character set utf8 NOT NULL default '',
  `description` text character set utf8 NOT NULL,
  `inHome` tinyint(1) NOT NULL default '0',
  `name` varchar(150) character set utf8 NOT NULL default '',
  `userID` varchar(150) character set utf8 NOT NULL default '0',
  `rate` int(10) NOT NULL default '0',
  PRIMARY KEY  (`linkID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `userNews` */

DROP TABLE IF EXISTS `userNews`;

CREATE TABLE `userNews` (
  `userID` varchar(150) NOT NULL default '0',
  `url` varchar(150) NOT NULL default '',
  `inHome` tinyint(1) NOT NULL default '0' COMMENT 'flag para a publicacao ou nao na home page',
  `newsID` bigint(10) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `rate` int(10) NOT NULL default '1',
  PRIMARY KEY  (`newsID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `userShelf` */

DROP TABLE IF EXISTS `userShelf`;

CREATE TABLE `userShelf` (
  `userDirID` bigint(10) unsigned NOT NULL auto_increment,
  `userID` varchar(150) character set utf8 NOT NULL default '0',
  `docID` varchar(30) character set utf8 NOT NULL default '',
  `citedStat` tinyint(1) NOT NULL default '0',
  `accessStat` tinyint(1) NOT NULL default '0',
  `insertDate` datetime NOT NULL default CURRENT_TIMESTAMP,
  `rate` int(10) NOT NULL default '0',
  `visible` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`userDirID`,`docID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `sysUID` bigint(10) unsigned NOT NULL auto_increment,
  `userID` varchar(150) character set utf8 NOT NULL default '',
  `userFirstName` varchar(150) character set utf8 NOT NULL default '',
  `userLastName` varchar(150) character set utf8 NOT NULL default '',
  `userEmail` varchar(45) character set utf8 NOT NULL default '',
  `userPassword` varchar(32) character set utf8 NOT NULL default '',
  `userGender` char(1) character set utf8 NOT NULL default '',
  `userAffiliation` varchar(45) character set utf8 default '',
  `userDegree` varchar(45) character set utf8 default '',
  `userCountry` varchar(150) character set utf8 default '',
  `userSource` varchar(150) character set utf8 default '',
  `sguID` varchar(150) character set utf8 default '',
  PRIMARY KEY  (`sysUID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
