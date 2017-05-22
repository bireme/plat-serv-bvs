-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: mysql.teste.bireme.br
-- Tempo de Geração: 04/08/2016 às 15:35:28
-- Versão do Servidor: 5.1.57
-- Versão do PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `servicesplatform`
--
CREATE DATABASE IF NOT EXISTS `servicesplatform` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `servicesplatform`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dataHistory`
--

CREATE TABLE IF NOT EXISTS `dataHistory` (
  `traceID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(150) NOT NULL DEFAULT '',
  `action` varchar(150) NOT NULL DEFAULT '',
  `target` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`traceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `directories`
--

CREATE TABLE IF NOT EXISTS `directories` (
  `dirID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `offline` int(10) NOT NULL DEFAULT '0',
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `public` int(10) DEFAULT '0',
  PRIMARY KEY (`dirID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docTitle`
--

CREATE TABLE IF NOT EXISTS `docTitle` (
  `lang` char(2) NOT NULL,
  `docTitle` varchar(1000) NOT NULL,
  `docID` varchar(100) NOT NULL,
  PRIMARY KEY (`lang`,`docID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `docID` varchar(100) NOT NULL,
  `srcID` varchar(100) NOT NULL,
  `authors` longtext NOT NULL,
  `serial` varchar(200) NOT NULL,
  `keywords` longtext,
  `year` varchar(4) DEFAULT '',
  `number` varchar(10) DEFAULT '',
  `volume` varchar(10) DEFAULT '',
  `suppl` varchar(50) DEFAULT '',
  `publication_date` varchar(22) DEFAULT '',
  `process_date` varchar(22) DEFAULT '',
  `docURL` varchar(1000) NOT NULL,
  `title` varchar(500) DEFAULT '',
  PRIMARY KEY (`docID`,`srcID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `docID` varchar(100) NOT NULL,
  `profile` varchar(150) NOT NULL DEFAULT '',
  `authors` longtext NOT NULL,
  `docURL` varchar(1000) NOT NULL,
  `title` varchar(500) DEFAULT '',
  `userID` varchar(150) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`docID`,`profile`,`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `profileID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `profileText` varchar(500) NOT NULL DEFAULT '',
  `profileName` varchar(150) NOT NULL DEFAULT '',
  `profileStatus` char(4) NOT NULL DEFAULT '',
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_grande_area` int(10) UNSIGNED DEFAULT '0',
  `id_sub_area` int(10) UNSIGNED DEFAULT '0',
  `profileDefault` tinyint(1) NOT NULL,
  PRIMARY KEY (`profileID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userLinks`
--

CREATE TABLE IF NOT EXISTS `userLinks` (
  `linkID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `inHome` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '',
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rate` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`linkID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userNews`
--

CREATE TABLE IF NOT EXISTS `userNews` (
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(300) NOT NULL,
  `inHome` tinyint(1) NOT NULL DEFAULT '0',
  `newsID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `rate` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userShelf`
--

CREATE TABLE IF NOT EXISTS `userShelf` (
  `userDirID` int(10) UNSIGNED NOT NULL,
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `docID` varchar(100) NOT NULL DEFAULT '',
  `citedStat` tinyint(1) NOT NULL DEFAULT '0',
  `accessStat` tinyint(1) NOT NULL DEFAULT '0',
  `insertDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate` int(10) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `shelfID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`shelfID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userConfirm`
--

CREATE TABLE IF NOT EXISTS `userConfirm` (
  `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sysUID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `key` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmation_date` datetime,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userFirstName` varchar(150) NOT NULL DEFAULT '',
  `userLastName` varchar(150) NOT NULL DEFAULT '',
  `userEmail` varchar(150) NOT NULL DEFAULT '',
  `userPassword` varchar(32) NOT NULL DEFAULT '',
  `userGender` char(1) NOT NULL DEFAULT '',
  `userAffiliation` varchar(45) DEFAULT '',
  `userDegree` varchar(45) DEFAULT '',
  `sysUID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` varchar(150) NOT NULL DEFAULT '',
  `sguID` varchar(150) DEFAULT '',
  `userCountry` varchar(150) DEFAULT '',
  `userSource` varchar(150) DEFAULT '',
  `linkedin` varchar(300) DEFAULT '',
  `researchGate` varchar(300) DEFAULT '',
  `orcid` varchar(150) DEFAULT '',
  `orcidData` longtext,
  `researcherID` varchar(150) DEFAULT '',
  `lattes` varchar(300) DEFAULT '',
  PRIMARY KEY (`sysUID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
