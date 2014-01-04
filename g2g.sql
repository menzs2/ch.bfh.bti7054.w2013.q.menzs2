-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jan 2014 um 16:40
-- Server Version: 5.6.11
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
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CUS_PK` int(5) NOT NULL AUTO_INCREMENT,
  `CUS_Salutation` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `CUS_FirstName` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_LastName` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_Street` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_Postcode` int(5) NOT NULL,
  `CUS_Place` varchar(20) COLLATE latin1_bin NOT NULL,
  `CUS_Phone` varchar(15) COLLATE latin1_bin NOT NULL,
  `CUS_Email` varchar(30) COLLATE latin1_bin NOT NULL,
  `CUS_UserName` varchar(15) COLLATE latin1_bin NOT NULL,
  `CUS_Password` varchar(128) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`CUS_PK`),
  UNIQUE KEY `CUS_UserName` (`CUS_UserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`CUS_PK`, `CUS_Salutation`, `CUS_FirstName`, `CUS_LastName`, `CUS_Street`, `CUS_Postcode`, `CUS_Place`, `CUS_Phone`, `CUS_Email`, `CUS_UserName`, `CUS_Password`) VALUES
(1, NULL, 'Gulasch', '2 Go', 'Kochergasse 4', 3000, 'Bern', '099 999 999 99', 'g2g@g2g.ch', 'g2gAdmin', 'g2gAdmin'),
(2, 'Frau', 'Patrizia', 'Morganfield', 'Sucherstrasse 245', 3012, 'Bern', '099 239 349', 'fake', 'morgp1', 'morgp1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `itemoptions`
--

CREATE TABLE IF NOT EXISTS `itemoptions` (
  `IOP_PK` int(5) NOT NULL AUTO_INCREMENT,
  `IOP_Item_FK` int(5) NOT NULL,
  `IOP_Option_FK` int(5) NOT NULL,
  PRIMARY KEY (`IOP_PK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `itemoptions`
--

INSERT INTO `itemoptions` (`IOP_PK`, `IOP_Item_FK`, `IOP_Option_FK`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menuitem`
--

CREATE TABLE IF NOT EXISTS `menuitem` (
  `MIT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `MIT_Code` varchar(30) COLLATE latin1_bin NOT NULL,
  `MIT_Type` varchar(30) COLLATE latin1_bin NOT NULL,
  `MIT_Name` int(5) NOT NULL DEFAULT '1',
  `MIT_Description` int(5) NOT NULL DEFAULT '1',
  `MIT_Price` float NOT NULL,
  `MIT_Available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MIT_PK`),
  UNIQUE KEY `MIT_Code` (`MIT_Code`),
  KEY `MIT_Name` (`MIT_Name`),
  KEY `MIT_Name_2` (`MIT_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `menuitem`
--

INSERT INTO `menuitem` (`MIT_PK`, `MIT_Code`, `MIT_Type`, `MIT_Name`, `MIT_Description`, `MIT_Price`, `MIT_Available`) VALUES
(1, 'Rind', 'maindish', 6, 24, 9.5, 1),
(2, 'RindS', 'maindish', 7, 25, 9.5, 1),
(3, 'Schwein', 'maindish', 8, 1, 9.5, 1),
(4, 'Lamm', 'maindish', 11, 1, 10, 1),
(5, 'Wurst', 'maindish', 9, 1, 8.5, 1),
(6, 'Kart', 'maindish', 10, 1, 8.5, 1),
(7, 'Knöd', 'sidedish', 12, 1, 5, 1),
(8, 'Stock', 'sidedish', 13, 1, 5, 1),
(9, 'Spätz', 'sidedish', 15, 1, 5.5, 1),
(10, 'Nudl', 'sidedish', 14, 1, 4.5, 1),
(11, 'Röst', 'sidedish', 16, 1, 5, 1),
(12, 'ueli', 'beverages', 19, 1, 3.5, 1),
(13, 'pils', 'beverages', 20, 1, 4.5, 1),
(14, 'stoer', 'beverages', 21, 1, 4.5, 1),
(15, 'merl', 'beverages', 22, 1, 10, 1),
(16, 'cola', 'beverages', 23, 1, 3.5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `OPT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `OPT_Type` varchar(30) COLLATE latin1_bin NOT NULL,
  `OPT_Code` varchar(30) COLLATE latin1_bin NOT NULL,
  `OPT_Name` int(5) NOT NULL,
  `OPT_Description` int(5) NOT NULL,
  `OPT_Price` float NOT NULL,
  PRIMARY KEY (`OPT_PK`),
  UNIQUE KEY `OPT_Code` (`OPT_Code`),
  KEY `OPT_Name` (`OPT_Name`,`OPT_Description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `options`
--

INSERT INTO `options` (`OPT_PK`, `OPT_Type`, `OPT_Code`, `OPT_Name`, `OPT_Description`, `OPT_Price`) VALUES
(1, 'MenuItem', 'Schärfe++', 1, 1, 0),
(2, 'MenuItem', 'Schärfe-', 1, 1, 0),
(3, 'MenuItem', 'Pilze', 1, 1, 2.5),
(4, 'MenuItem', 'Zwiebel++', 1, 1, 1.5),
(5, 'MenuItem', 'Saurr', 1, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE IF NOT EXISTS `order` (
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
-- Tabellenstruktur für Tabelle `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `OIT_PK` int(9) NOT NULL AUTO_INCREMENT,
  `OIT_Order` int(6) NOT NULL,
  `OIT_MenuItem` int(5) NOT NULL,
  PRIMARY KEY (`OIT_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orderitemsoptions`
--

CREATE TABLE IF NOT EXISTS `orderitemsoptions` (
  `OIP_PK` int(9) NOT NULL AUTO_INCREMENT,
  `OIP_OrderItem_FK` int(5) NOT NULL,
  `OIP_Options` int(5) NOT NULL,
  PRIMARY KEY (`OIP_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orderoptions`
--

CREATE TABLE IF NOT EXISTS `orderoptions` (
  `OOP_PK` int(5) NOT NULL AUTO_INCREMENT,
  `OOP_Order_FK` int(6) NOT NULL,
  `OOP_Option_FK` int(5) NOT NULL,
  PRIMARY KEY (`OOP_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texts`
--

CREATE TABLE IF NOT EXISTS `texts` (
  `TXT_PK` int(5) NOT NULL AUTO_INCREMENT,
  `TXT_Code` varchar(20) COLLATE latin1_bin NOT NULL,
  `TXT_de` varchar(256) COLLATE latin1_bin NOT NULL,
  `TXT_fr` varchar(256) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`TXT_PK`),
  UNIQUE KEY `TXT_Code` (`TXT_Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=26 ;

--
-- Daten für Tabelle `texts`
--

INSERT INTO `texts` (`TXT_PK`, `TXT_Code`, `TXT_de`, `TXT_fr`) VALUES
(1, 'TextTODO', 'Text not yet in DB', 'Text not yet in DB'),
(2, 'no text', '', ''),
(3, 'welcome1', 'Willkommen bei Gulasch-2-Go', 'Bienvenue chez Gulsch-2-go'),
(4, 'welcome2', 'Wir liefern die besten und herzhaftesten Gulasche und Eint&ouml;pe direkt zu Ihnen nach Hause', 'Nous vous livraisons les meilleures et savoureuse goulache à votre maison'),
(5, 'chooseMenu', 'W&auml;hlen Sie Ihr Menu', 'Choissisez votre menu'),
(6, 'MDRind', 'Rindsgulasch', 'Goulash de boeuf'),
(7, 'MDRindS', 'Rindsgulasch scharf', 'Goulache de boeuf fort'),
(8, 'MDSchwein', 'Schweinsgulasch', 'Goulache de porc'),
(9, 'MDWurst', 'Wurstgulasch', 'Goulache de saussice'),
(10, 'MDKart', 'Erdäfpelgulasch', 'Goulache de pommes de terre'),
(11, 'MDLamm', 'Lammgulasch', 'Goulache d''''agneau'),
(12, 'SDKnöd', 'Kn&ouml;del', 'Knoedel'),
(13, 'SDStock', 'Kartoffelstock', 'Purée des pommes de terre'),
(14, 'SDNudl', 'Nudeln', 'Nouilles'),
(15, 'SDSpätz', 'Sp&auml;tzle', 'Spaetzle'),
(16, 'SDRösti', 'R&ouml;sti', 'Roesti'),
(17, 'HmainD', 'Hauptgerichte', 'Plats principaux'),
(18, 'HSideD', 'Beilagen', 'Plats acompagnement'),
(19, 'Ueli', 'Ueli Bier', 'Uelir bier'),
(20, 'Pils', 'Pilsener Urquell', 'Pilsener Urquell'),
(21, 'Stoer', 'Stoertebekker Schwarz', 'Stoertebekker Schwarz'),
(22, 'Merlot', 'Merlot', 'Merlot'),
(23, 'Coca', 'Coca Cola', 'Coca Cola'),
(24, 'mama', 'Wie bei Mutter', 'Comme chez mama'),
(25, 'mehrF', 'Mit mehr Feuer', 'Le feu du Puzta');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
