--
-- Daten für Tabelle `Menu Items`
--
INSERT INTO `MenuItem` (`MIT_PK`, `MIT_Code`, `MIT_Type`, `MIT_Name`, `MIT_Description`, `MIT_Price`, `MIT_Available`) VALUES
(1, 'Rind', 'maindish', 6, 1, 9.5, 1),
(2, 'RindS', 'maindish', 7, 1, 9.5, 1),
(3, 'Schwein', 'maindish', 8, 1, 9.5, 1),
(4, 'Lamm', 'maindish', 11, 1, 10.0, 1),
(5, 'Wurst', 'maindish', 9, 1, 8.50, 1),
(6, 'Kart', 'maindish', 10,  1, 8.50, 1),
(7, 'Knöd', 'sidedish', 12, 1, 5.00, 1),
(8, 'Stock', 'sidedish', 13, 1, 5.00, 1),
(9, 'Spätz', 'sidedish', 15, 1, 5.50, 1),
(10, 'Nudl', 'sidedish', 14, 1, 4.50,1),
(11, 'Röst', 'sidedish', 16, 1, 5.00,1);

--
-- Daten für Tabelle `Texts`
--

INSERT INTO `Texts` (`TXT_PK`, `TXT_Code`, `TXT_DE`, `TXT_FR`) VALUES
(1, 'TextTODO', 'Text not yet in DB', 'Text not yet in DB'),
(2, 'no text', '', ''),
(3, 'welcome1', 'Willkommen bei Gulasch-2-Go', 'Bienvenue chez Gulsch-2-go'),
(4, 'welcome2', 'Wir liefern die besten und herzhaftesten Gulasche und Eintöpe direkt zu Ihnen nach Hause', 'Nous vous livraisons les meilleures et savoureuse goulache à votre maison'),
(5, 'chooseMenu', 'Wählen Sie Ihr Menu', 'Choissisez votre menu'),
(6, 'MDRind', 'Rindsgulasch', 'Goulash de boeuf'),
(7, 'MDRindS', 'Rindsgulasch scharf', 'Goulache de boeuf fort'),
(8, 'MDSchwein', 'Schweinsgulasch', 'Goulache de porc'),
(9, 'MDWurst', 'Wurstgulasch', 'Goulache de saussice'),
(10, 'MDKart', 'Erdäfpelgulasch', 'Goulache de pommes de terre'),
(11, 'MDLamm', 'Lammgulasch', 'Goulache d''''agneau'),
(12, 'SDKnöd', 'Knödel', 'Knödel'),
(13, 'SDStock', 'Kartoffelstock', 'Purée des pommes de terre'),
(14, 'SDNudl', 'Nudeln', 'Nouilles'),
(15, 'SDSpätz', 'Spätzle', 'Spätzle'),
(16, 'SDRösti', 'Rösti', 'Roesti');


--
-- Daten für Tabelle `Customer`
--

INSERT INTO `Customer` (`CUS_PK`, `CUS_Salutation`, `CUS_FirstName`, `CUS_LastName`, `CUS_Street`, `CUS_Postcode`, `CUS_Place`, `CUS_UserName`, `CUS_Password`) VALUES
(1, '', 'gulasch', '2-Go', 'Kochergasse 4', 3000, 'Bern', 'myAdmin', 'myAdmin');
(
