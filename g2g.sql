-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 30. Nov 2013 um 14:42
-- Server Version: 5.6.12
-- PHP-Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `g2g`
--
CREATE DATABASE IF NOT EXISTS `g2g` DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE `g2g`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `CUS_PK` int(5) NOT NULL AUTO_INCREMENT,
  `CUS_Salutation` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `CUS_FirstName` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_LastName` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_Street` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_Postcode` int(5) NOT NULL,
  `CUS_Place` varchar(20) COLLATE latin1_bin NOT NULL,
  `CUS_UserName` varchar(15) COLLATE latin1_bin NOT NULL,
  `CUS_Password` varchar(128) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`CUS_PK`),
  UNIQUE KEY `CUS_UserName` (`CUS_UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ItemOptions`
--

CREATE TABLE IF NOT EXISTS `ItemOptions` (
  `IOP_PK` int(5) NOT NULL AUTO_INCREMENT,
  `IOP_Item_FK` int(5) NOT NULL,
  `IOP_Option_FK` int(5) NOT NULL,
  PRIMARY KEY (`IOP_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `MenuItem`
--

CREATE TABLE IF NOT EXISTS `MenuItem` (
  `MIT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `MIT_Code` varchar(30) COLLATE latin1_bin NOT NULL,
  `MIT_Type` varchar(30) COLLATE latin1_bin NOT NULL,
  `MIT_Name` int(5) NOT NULL,
  `MIT_Description` int(5) NOT NULL,
  `MIT_Price` float NOT NULL,
  `MIT_Available` tinyint(1) NOT NULL,
  PRIMARY KEY (`MIT_PK`),
  UNIQUE KEY `MIT_Code` (`MIT_Code`),
  KEY `MIT_Name` (`MIT_Name`),
  KEY `MIT_Name_2` (`MIT_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Options`
--

CREATE TABLE IF NOT EXISTS `Options` (
  `OPT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `OPT_Type` varchar(30) COLLATE latin1_bin NOT NULL,
  `OPT_Code` varchar(30) COLLATE latin1_bin NOT NULL,
  `OPT_Name` int(5) NOT NULL,
  `OPT_Description` int(5) NOT NULL,
  `OPT_Price` float NOT NULL,
  PRIMARY KEY (`OPT_PK`),
  UNIQUE KEY `OPT_Code` (`OPT_Code`),
  KEY `OPT_Name` (`OPT_Name`,`OPT_Description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `ORD_PK` int(6) NOT NULL AUTO_INCREMENT,
  `ORD_Number` int(6) NOT NULL,
  `ORD_Customer` int(5) NOT NULL,
  `ORD_Date` datetime NOT NULL,
  `ORD_deliverd` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ORD_PK`),
  UNIQUE KEY `ORD_Number` (`ORD_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `OrderItems`
--

CREATE TABLE IF NOT EXISTS `OrderItems` (
  `OIT_PK` int(9) NOT NULL AUTO_INCREMENT,
  `OIT_Order` int(6) NOT NULL,
  `OIT_MenuItem` int(5) NOT NULL,
  PRIMARY KEY (`OIT_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `OrderItemsOptions`
--

CREATE TABLE IF NOT EXISTS `OrderItemsOptions` (
  `OIP_PK` int(9) NOT NULL AUTO_INCREMENT,
  `OIP_OrderItem_FK` int(5) NOT NULL,
  `OIP_Options` int(5) NOT NULL,
  PRIMARY KEY (`OIP_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `OrderOptions`
--

CREATE TABLE IF NOT EXISTS `OrderOptions` (
  `OOP_PK` int(5) NOT NULL AUTO_INCREMENT,
  `OOP_Order_FK` int(6) NOT NULL,
  `OOP_Option_FK` int(5) NOT NULL,
  PRIMARY KEY (`OOP_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Texts`
--

CREATE TABLE IF NOT EXISTS `Texts` (
  `TXT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `TXT_Code` varchar(20) COLLATE latin1_bin NOT NULL,
  `TXT_DE` varchar(256) COLLATE latin1_bin NOT NULL,
  `TXT_FR` varchar(256) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`TXT_PK`),
  UNIQUE KEY `TXT_Code` (`TXT_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
