-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 14 fév. 2018 à 18:54
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `FFF2`
--

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `IDCATEGORIE` smallint(6) NOT NULL,
  `TRANCHEAGECATEGORIE` char(32) DEFAULT NULL,
  `nomCategorie` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`IDCATEGORIE`, `TRANCHEAGECATEGORIE`, `nomCategorie`) VALUES
(1, '6-9', 'Poussin'),
(2, '9-12', 'Benjamin'),
(3, '12-15', 'Minime'),
(4, '16-18', 'Cadet'),
(5, '18-25', 'Espoir'),
(6, '25-50', 'Senior'),
(7, '50-et plus', 'Vétéran');

-- --------------------------------------------------------

--
-- Structure de la table `CLUB`
--

CREATE TABLE `CLUB` (
  `IDCLUB` smallint(6) NOT NULL,
  `IDLIGUE` smallint(6) NOT NULL,
  `NOMCLUB` char(32) DEFAULT NULL,
  `VILLECLUB` char(32) DEFAULT NULL,
  `PAYSCLUB` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CLUB`
--

INSERT INTO `CLUB` (`IDCLUB`, `IDLIGUE`, `NOMCLUB`, `VILLECLUB`, `PAYSCLUB`) VALUES
(14, 1, 'FC YUTZ', 'Yutz', 'France'),
(15, 1, 'FC METZ', 'Metz', 'France'),
(16, 2, 'AC villerupt', 'Villerupt', 'France'),
(20, 1, 'UC 12', 'Villerupt', 'France'),
(24, 1, 'FC Ancy', 'Ancy sur Moselle', 'France'),
(25, 2, 'FC Nancy', 'Nancy', 'France'),
(26, 1, 'AC GB', 'Bertrange', 'France'),
(27, 1, 'FC Florange', 'Florange', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `DIRECTEUR`
--

CREATE TABLE `DIRECTEUR` (
  `IDUSERLIGUE` smallint(6) NOT NULL,
  `IDCOUSER` varchar(10) NOT NULL,
  `NOMUSERLIGUE` char(32) DEFAULT NULL,
  `MDPUSERLIGUE` char(32) DEFAULT NULL,
  `IDLIGUE` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DIRECTEUR`
--

INSERT INTO `DIRECTEUR` (`IDUSERLIGUE`, `IDCOUSER`, `NOMUSERLIGUE`, `MDPUSERLIGUE`, `IDLIGUE`) VALUES
(1, 'Becker', 'Becker', 'jonathan', 1),
(2, 'Slander', 'Slander', 'patrick', 2),
(4, 'Sclank', 'Schlank', 'bastien', 10),
(5, 'Vava54', 'D\'Ignazio', 'valentine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `INSCRIPTION`
--

CREATE TABLE `INSCRIPTION` (
  `IDINSCRIPTION` smallint(6) NOT NULL,
  `IDJOUEUR` smallint(6) DEFAULT NULL,
  `IDLICENCE` smallint(6) NOT NULL,
  `DATEINSCRIPTION` date DEFAULT NULL,
  `IDCLUB` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `INSCRIPTION`
--

INSERT INTO `INSCRIPTION` (`IDINSCRIPTION`, `IDJOUEUR`, `IDLICENCE`, `DATEINSCRIPTION`, `IDCLUB`) VALUES
(1, 78, 1, '2018-01-02', 14),
(34, 97, 38, '2018-01-02', 20),
(37, 98, 41, '2018-01-02', 14),
(38, 78, 42, '2018-01-02', 15),
(39, 99, 43, '2018-01-02', 24),
(40, 99, 44, '2018-01-02', 15),
(41, 100, 45, '2018-01-02', 14),
(42, 100, 46, '2018-01-02', 20),
(43, 101, 47, '2018-01-03', 16),
(44, 102, 48, '2018-01-04', 20),
(45, 99, 49, '2018-01-05', 24),
(46, 99, 50, '2018-01-05', 15),
(47, 103, 51, '2018-01-05', 16),
(48, NULL, 52, '2018-01-05', 16),
(50, NULL, 54, '2018-01-05', 16),
(51, NULL, 55, '2018-01-05', 25),
(52, 108, 56, '2018-01-05', 14),
(53, 109, 57, '2018-01-05', 20),
(54, 78, 58, '2018-01-05', 20),
(55, 110, 59, '2018-01-05', 14),
(56, 110, 60, '2018-01-05', 15),
(57, NULL, 61, '2018-01-06', 14),
(58, NULL, 62, '2018-01-06', 26),
(59, 112, 63, '2018-01-06', 16),
(60, 101, 64, '2018-01-06', 25),
(61, 102, 65, '2018-01-06', 26),
(62, 100, 66, '2018-01-06', 15),
(63, 113, 67, '2018-01-08', 26),
(64, 114, 68, '2018-01-14', 20),
(65, 115, 69, '2018-01-14', 14),
(66, 116, 70, '2018-01-15', 14),
(67, 78, 71, '2018-01-15', 14),
(68, 101, 72, '2018-01-15', 16),
(70, NULL, 83, '2018-01-27', 14),
(71, NULL, 84, '2018-01-27', 14),
(72, NULL, 85, '2018-01-27', 20),
(73, NULL, 86, '2018-01-27', 14),
(74, 122, 87, '2018-01-27', 14),
(75, 115, 88, '2018-01-27', 15),
(76, 115, 88, '2018-01-27', 14),
(77, NULL, 91, '2018-01-27', 20),
(78, NULL, 91, '2018-01-27', 14),
(79, 115, 88, '2018-01-27', 24),
(80, 114, 94, '2018-01-27', 24),
(81, 114, 94, '2018-01-27', 26),
(82, 115, 88, '2018-01-27', 26),
(83, 124, 97, '2018-01-27', 24),
(84, 125, 98, '2018-01-27', 15),
(85, 126, 99, '2018-01-27', 14),
(86, 126, 99, '2018-01-27', 15),
(88, 126, 99, '2018-01-27', 26),
(89, 116, 103, '2018-01-28', 26),
(90, 127, 104, '2018-01-29', 14),
(91, 128, 105, '2018-01-29', 14),
(92, 114, 106, '2018-02-08', 14),
(93, 114, 107, '2018-02-08', 26),
(95, 129, 109, '2018-02-12', 14),
(105, 116, 124, '2018-02-12', 27),
(109, 129, 109, '2018-02-12', 26),
(110, 129, 109, '2018-02-12', 26),
(111, 129, 109, '2018-02-12', 24),
(112, 128, 126, '2018-02-12', 20),
(113, 129, 109, '2018-02-12', 14),
(114, 130, 128, '2018-02-13', 14),
(115, 131, 129, '2018-02-13', 27),
(116, 122, 130, '2018-02-13', 24),
(117, 122, 130, '2018-02-13', 27);

-- --------------------------------------------------------

--
-- Structure de la table `JOUEUR`
--

CREATE TABLE `JOUEUR` (
  `IDJOUEUR` smallint(6) NOT NULL,
  `IDCATEGORIE` smallint(6) NOT NULL,
  `NOMJOUEUR` char(32) NOT NULL,
  `PRENOMJOUEUR` char(32) NOT NULL,
  `ADRESSEJOUEUR` char(32) DEFAULT NULL,
  `CPJOUEUR` char(32) DEFAULT NULL,
  `VILLEJOUEUR` char(32) DEFAULT NULL,
  `PAYSJOUEUR` char(32) DEFAULT NULL,
  `EMAILJOUEUR` char(32) DEFAULT NULL,
  `TELEPHONEJOUEUR` char(32) DEFAULT NULL,
  `IDINSCRIPTION` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `JOUEUR`
--

INSERT INTO `JOUEUR` (`IDJOUEUR`, `IDCATEGORIE`, `NOMJOUEUR`, `PRENOMJOUEUR`, `ADRESSEJOUEUR`, `CPJOUEUR`, `VILLEJOUEUR`, `PAYSJOUEUR`, `EMAILJOUEUR`, `TELEPHONEJOUEUR`, `IDINSCRIPTION`) VALUES
(78, 3, 'Lucas', 'Cuoco', '2 allée Micheline Ostermeyer', '57970', 'Yutz', 'France', 'lucas.cuoco@gmail.com', '0789765432', 1),
(97, 3, 'De Blaquet', 'Alexandre', '2 rue Du moulin haut', '57890', 'Congo', 'France', 'alex@lol.fr', '089787654', 34),
(98, 2, 'Alexandre', 'Dumas', '3 rue du jambonneau', '57890', 'Bertrange', 'France', 'a.d@cara.fr', '0987654328', 37),
(99, 3, 'Catherine', 'Cuoco', '42 rue du puis', '57130', 'Ancy', 'Angleterre', 'giova.cuoco@gmail.fr', '0686161014', 39),
(100, 2, 'D\'Ignazio', 'Valentine', '20 rue St victor', '541900', 'Villerupt sur Marne', 'France', 'vava.fr', '098765432', 41),
(101, 3, 'Pignon', 'Marcel', '5 rue d\'Allemagne', '58907', 'Frabi', 'France', 'pignon.m@gmail.com', '0798876543', 43),
(102, 3, 'Marine', 'Sant Angelo', '2 rue du mayet', '57890', 'Kuntzig', 'France', 'marine.sa@gmail.com', '06223456', 44),
(103, 2, 'Alexis', 'Du Four', '2 allée André Maleraux', '54351', 'Aumetz', 'France', 'alexis.dufour@mail.fr', '0798765432', 47),
(108, 3, 'Adriana', 'Carambeu', '2 rue du puit', '57689', 'Hagondange', 'France', 'lio@gmail.com', '09876789', 52),
(109, 3, 'Barenthal', 'Harry', '5 allée du puy de dome', '57890', 'Illange', 'France', 'bar.harry@gmail.com', '09876543', 53),
(110, 3, 'Baumann', 'Jonathan', 'Rue de la Republique', '57970', 'Yutz', 'France', 'jonathan@caramil.fr', '0687980909', 55),
(112, 2, 'Patrick', 'Genter', '2 rue du Sac de billes', '56890', 'Mondelage', 'France', 'patrick.genter@gmail.com', '0678875456', 59),
(113, 4, 'Alexis', 'O\'Maley', '2 rue du glanda', '58900', 'Mayar', 'France', 'om@gmail.com', '08987654', 63),
(114, 1, 'Harry', 'Potter', '2 rue de poudlard', '56789', 'Cul de Sac', 'Angleterre', 'hp@poud.fr', '09875642', 64),
(115, 2, 'Malcolm', 'aubrack', '1 rue du saucisson', '57689', 'Yutz', 'France', 'm.a@aol.frlol', '089765432', 65),
(116, 2, 'Lucas', 'Diabot', '2 rue du mayet', '5689', 'Rldo', 'France', 'lucas.diabot@gmail.com', '09873625324', 66),
(122, 1, 'Alex', 'Bald', '2 rue du roi', '57890', ' Hayange', 'France', 'alec.bald@gmail.com', '0898765432', 74),
(124, 5, 'Barique', 'Freyate', 'rue du rouge gorge', '57890', 'Metz', 'France', 'b.freayte@gmail.com', '078987654', 83),
(125, 1, 'Maire', 'Lea', '2 rue de la mairie', '57689', 'Metz', 'France', 'lea.m@gmail.com', '09089765', 84),
(126, 3, 'Cuoco', 'Elisa', '2 allée micheline Ostermeyer', '57970', 'Yutz', 'France', 'elisa.cuoco@gmail.com', '0698987875', 85),
(127, 1, 'Peut', 'Importre', '2 rue aled', '67890', 'Motingny', 'France', 'p@.com', 'ksdjqd', 90),
(128, 6, 'Alice', 'Watrinet', '2 rue du dauphinet', '57970', 'Yutz', 'France', 'alice.watri@gmail.com', '0898765432', 91),
(129, 6, 'Gustave', 'Effeil', '12 rue des mimosas', '57970', 'Yutz', 'France', 'gustave.effeil@gmail.com', '089787654', 95),
(130, 2, 'Maraise', 'Adrien', '', '', '', '', '', '', 114),
(131, 5, 'Marine', 'Du balais', '', '', '', '', '', '', 115);

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE`
--

CREATE TABLE `LICENCE` (
  `IDLICENCE` smallint(6) NOT NULL,
  `NUMEROSLICENCE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LICENCE`
--

INSERT INTO `LICENCE` (`IDLICENCE`, `NUMEROSLICENCE`) VALUES
(1, '21323123'),
(38, '3De BlaquetAlexandre2302-01-2018'),
(41, '1AlexandreDumas1402-01-2018'),
(42, '3LucasCuoco1502-01-2018'),
(43, '2CatherineCuoco2402-01-2018'),
(44, '2CatherineCuoco1502-01-2018'),
(45, '2D\'IgnazioValentine1402-01-2018'),
(46, '2D\'IgnazioValentine2002-01-2018'),
(47, '3PignonMarcel1603-01-2018'),
(48, '3MarineSant Angelo2004-01-2018'),
(49, '2CatherineCuoco2405-01-2018'),
(50, '2CatherineCuoco1505-01-2018'),
(51, '2AlexisDu Four1605-01-2018'),
(52, '1azeaze1605-01-2018'),
(54, '1aloriglom1605-01-2018'),
(55, '1PedroSanchez2505-01-2018'),
(56, '3AdrianaCarambeu1405-01-2018'),
(57, '3BarenthalHarry2005-01-2018'),
(58, '3LucasCuoco2005-01-2018'),
(59, '1BaumannJonathan1405-01-2018'),
(60, '1BaumannJonathan1505-01-2018'),
(61, '3CuocoGiovanni1406-01-2018'),
(62, '3CuocoGiovanni2606-01-2018'),
(63, '1Patrickgenter1606-01-2018'),
(64, '3PignonMarcel2506-01-2018'),
(65, '3MarineSant Angelo2606-01-2018'),
(66, '2D\'IgnazioValentone1506-01-2018'),
(67, '1AlexisO\'Maley2608-01-2018'),
(68, '1HarryPotter2014-01-2018'),
(69, '1Malcolmaubrack1414-01-2018'),
(70, '1LucasDiabot1415-01-2018'),
(71, '3LucasCuoco1415-01-2018'),
(72, '3PignonMarcel1615-01-2018'),
(73, '1Alxeandreallo1427-01-2018'),
(74, '1olicdsc1427-01-2018'),
(75, '1azeaze1427-01-2018'),
(76, '1salut bg1427-01-2018'),
(77, '1azeazazee1427-01-2018'),
(78, '1omasd1427-01-2018'),
(79, '1azertyzz1427-01-2018'),
(80, '1yobgqs1427-01-2018'),
(81, '1mauriceduaml1427-01-2018'),
(82, '1garyhollman1427-01-2018'),
(83, '1alohomora1427-01-2018'),
(84, '1moriceduval1427-01-2018'),
(85, '1jannodolo2027-01-2018'),
(86, '1janodolo1427-01-2018'),
(87, '1AlecBald1427-01-2018'),
(88, '1Malcolmaubrack1427-01-2018'),
(89, '1Malcolmaubrack1427-01-2018'),
(90, '1Malcolmaubrack1427-01-2018'),
(91, '3MaioloBoris2027-01-2018'),
(92, '3MaioloBoris2027-01-2018'),
(93, '1Malcolmaubrack1427-01-2018'),
(94, '1HarryPotter2027-01-2018'),
(95, '1HarryPotter2027-01-2018'),
(96, '1Malcolmaubrack1427-01-2018'),
(97, '5BariqueFreyate2427-01-2018'),
(98, '1MaireLea1527-01-2018'),
(99, '3CuocoElisa1427-01-2018'),
(100, '3CuocoElisa1427-01-2018'),
(101, '3CuocoElisa1427-01-2018'),
(102, '3CuocoElisa1427-01-2018'),
(103, '1LucasDiabot1428-01-2018'),
(104, '1Peut Importre1429-01-2018'),
(105, '6AliceWatrinet1429-01-2018'),
(106, '1HarryPottero2008-02-2018'),
(107, '1HarryPotter2008-02-2018'),
(109, '6GustaveEffeil1412-02-2018'),
(124, '1LucasDiabot1412-02-2018'),
(126, '6AliceWatrinet1412-02-2018'),
(127, '6GustaveEffeil1412-02-2018'),
(128, '2MaraiseAdrien1413-02-2018'),
(129, '5MarineDu balais2713-02-2018'),
(130, '1AlexBald1413-02-2018'),
(131, '1AlexBald1413-02-2018');

-- --------------------------------------------------------

--
-- Structure de la table `LIGUE`
--

CREATE TABLE `LIGUE` (
  `IDLIGUE` smallint(6) NOT NULL,
  `IDUSERLIGUE` smallint(6) NOT NULL,
  `NOMLIGUE` char(32) DEFAULT NULL,
  `REGIONLIGUE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LIGUE`
--

INSERT INTO `LIGUE` (`IDLIGUE`, `IDUSERLIGUE`, `NOMLIGUE`, `REGIONLIGUE`) VALUES
(1, 1, 'Lorraine', 'Lorainne'),
(2, 2, 'Alsace', 'Alsace'),
(10, 4, 'Champagne', 'Champgane Ardenne');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`IDCATEGORIE`);

--
-- Index pour la table `CLUB`
--
ALTER TABLE `CLUB`
  ADD PRIMARY KEY (`IDCLUB`),
  ADD KEY `IDLIGUE` (`IDLIGUE`);

--
-- Index pour la table `DIRECTEUR`
--
ALTER TABLE `DIRECTEUR`
  ADD PRIMARY KEY (`IDUSERLIGUE`),
  ADD KEY `IDLIGUE` (`IDLIGUE`);

--
-- Index pour la table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD PRIMARY KEY (`IDINSCRIPTION`),
  ADD KEY `I_FK_INSCRIPTION_JOUEUR` (`IDJOUEUR`),
  ADD KEY `I_FK_INSCRIPTION_LICENCE` (`IDLICENCE`),
  ADD KEY `IDJOUEUR` (`IDJOUEUR`),
  ADD KEY `IDCLUB` (`IDCLUB`);

--
-- Index pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD PRIMARY KEY (`IDJOUEUR`),
  ADD KEY `IDCATEGORIE` (`IDCATEGORIE`),
  ADD KEY `IDINSCRIPTION` (`IDINSCRIPTION`);

--
-- Index pour la table `LICENCE`
--
ALTER TABLE `LICENCE`
  ADD PRIMARY KEY (`IDLICENCE`);

--
-- Index pour la table `LIGUE`
--
ALTER TABLE `LIGUE`
  ADD PRIMARY KEY (`IDLIGUE`),
  ADD KEY `IDUSERLIGUE` (`IDUSERLIGUE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  MODIFY `IDCATEGORIE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `CLUB`
--
ALTER TABLE `CLUB`
  MODIFY `IDCLUB` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `DIRECTEUR`
--
ALTER TABLE `DIRECTEUR`
  MODIFY `IDUSERLIGUE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  MODIFY `IDINSCRIPTION` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  MODIFY `IDJOUEUR` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT pour la table `LICENCE`
--
ALTER TABLE `LICENCE`
  MODIFY `IDLICENCE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT pour la table `LIGUE`
--
ALTER TABLE `LIGUE`
  MODIFY `IDLIGUE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `CLUB`
--
ALTER TABLE `CLUB`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`IDLIGUE`) REFERENCES `LIGUE` (`IDLIGUE`);

--
-- Contraintes pour la table `DIRECTEUR`
--
ALTER TABLE `DIRECTEUR`
  ADD CONSTRAINT `directeur_ibfk_1` FOREIGN KEY (`IDLIGUE`) REFERENCES `LIGUE` (`IDLIGUE`);

--
-- Contraintes pour la table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`IDLICENCE`) REFERENCES `LICENCE` (`IDLICENCE`),
  ADD CONSTRAINT `inscription_ibfk_4` FOREIGN KEY (`IDCLUB`) REFERENCES `CLUB` (`IDCLUB`),
  ADD CONSTRAINT `inscription_ibfk_5` FOREIGN KEY (`IDJOUEUR`) REFERENCES `JOUEUR` (`IDJOUEUR`) ON DELETE SET NULL;

--
-- Contraintes pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`IDCATEGORIE`) REFERENCES `CATEGORIE` (`IDCATEGORIE`),
  ADD CONSTRAINT `joueur_ibfk_4` FOREIGN KEY (`IDINSCRIPTION`) REFERENCES `INSCRIPTION` (`IDINSCRIPTION`);

--
-- Contraintes pour la table `LIGUE`
--
ALTER TABLE `LIGUE`
  ADD CONSTRAINT `ligue_ibfk_1` FOREIGN KEY (`IDUSERLIGUE`) REFERENCES `DIRECTEUR` (`IDUSERLIGUE`);
