-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 14 fév. 2018 à 18:42
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `FFF`
--

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
  `IDCLUB` smallint(6) NOT NULL,
  `IDLIGUE` smallint(6) NOT NULL,
  `IDINSCRIPTION` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `JOUEUR`
--

INSERT INTO `JOUEUR` (`IDJOUEUR`, `IDCATEGORIE`, `NOMJOUEUR`, `PRENOMJOUEUR`, `ADRESSEJOUEUR`, `CPJOUEUR`, `VILLEJOUEUR`, `PAYSJOUEUR`, `EMAILJOUEUR`, `TELEPHONEJOUEUR`, `IDCLUB`, `IDLIGUE`, `IDINSCRIPTION`) VALUES
(78, 3, 'Lucas', 'Cuoco', '2 allée Micheline Ostermeyer', '57970', 'Yutz', 'France', 'lucas.cuoco@gmail.com', '0789765432', 14, 1, 1),
(97, 3, 'De Blaquet', 'Alexandre', '2 rue Du moulin haut', '57890', 'Congo', 'France', 'alex@lol.fr', '089787654', 20, 1, 34),
(98, 2, 'Alexandre', 'Dumas', '3 rue du jambonneau', '57890', 'Bertrange', 'France', 'a.d@cara.fr', '0987654328', 14, 1, 37),
(99, 3, 'Catherine', 'Cuoco', '42 rue du puis', '57130', 'Ancy', 'Angleterre', 'giova.cuoco@gmail.fr', '0686161014', 15, 1, 39),
(100, 2, 'D\'Ignazio', 'Valentine', '20 rue St victor', '541900', 'Villerupt sur Marne', 'France', 'vava.fr', '098765432', 15, 1, 41),
(101, 3, 'Pignon', 'Marcel', '5 rue d\'Allemagne', '58907', 'Frabi', 'France', 'pignon.m@gmail.com', '0798876543', 16, 2, 43),
(102, 3, 'Marine', 'Sant Angelo', '2 rue du mayet', '57890', 'Kuntzig', 'France', 'marine.sa@gmail.com', '06223456', 26, 1, 44),
(103, 2, 'Alexis', 'Du Four', '2 allée André Maleraux', '54351', 'Aumetz', 'France', 'alexis.dufour@mail.fr', '0798765432', 16, 2, 47),
(108, 3, 'Adriana', 'Carambeu', '2 rue du puit', '57689', 'Hagondange', 'France', 'lio@gmail.com', '09876789', 20, 1, 52),
(109, 3, 'Barenthal', 'Harry', '5 allée du puy de dome', '57890', 'Illange', 'France', 'bar.harry@gmail.com', '09876543', 20, 1, 53),
(110, 3, 'Baumann', 'Jonathan', 'Rue de la Republique', '57970', 'Yutz', 'France', 'jonathan@caramil.fr', '0687980909', 15, 1, 55),
(112, 2, 'Patrick', 'Genter', '2 rue du Sac de billes', '56890', 'Mondelage', 'France', 'patrick.genter@gmail.com', '0678875456', 16, 2, 59),
(113, 1, 'Alexiso', 'O\'Maley', '2 rue du glanda', '58900', 'Mayar', 'France', 'om@gmail.com', '08987654', 26, 1, 63),
(114, 1, 'Harry', 'Potter', '2 rue de poudlard', '56789', 'Cul de Sac', 'Angleterre', 'hp@poud.fr', '09875642', 20, 1, 64),
(115, 1, 'Malcolm', 'aubrack', '1 rue de la saucisse', '57689', 'Yutz', 'France', 'm.a@aol.fr', '089765432', 14, 1, 65),
(116, 1, 'Lucas', 'Diabot', '2 rue du mayeton', '5689', 'Rldo', 'France', 'lucas.diabot@gmail.com', '09873625324', 14, 1, 66),
(117, 1, 'Jonathan', 'Dubalai', '2 rue du maillet', '57970', 'Yutz', 'France', 'jonathan.dubalais@gmail.com', '06879809092', 24, 1, 69),
(118, 1, 'Maurice', 'laval', '', '', '', '', '', '', 14, 1, 72),
(119, 3, 'Riva', 'Marine', '2 rue de metz', '54000', 'Nancy', 'France', 'marine.riva@gmail.com', '0979898765423', 26, 1, 73),
(120, 3, 'John', 'Doe', '', '', '', '', '', '', 24, 1, 75),
(121, 3, 'Brevi', 'Nicolas', '7 allée des peupliersa', '57150', 'Fontoy', 'Fance', 'brevi.nicolas@gmail.com', '0687980987', 28, 1, 77),
(123, 1, 'Willaume', 'Herve', 'rue du maillet', '', '', '', '', '', 24, 1, 80);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD PRIMARY KEY (`IDJOUEUR`),
  ADD KEY `IDCATEGORIE` (`IDCATEGORIE`),
  ADD KEY `IDCLUB` (`IDCLUB`),
  ADD KEY `IDLIGUE` (`IDLIGUE`),
  ADD KEY `IDINSCRIPTION` (`IDINSCRIPTION`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  MODIFY `IDJOUEUR` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `JOUEUR`
--
ALTER TABLE `JOUEUR`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`IDCATEGORIE`) REFERENCES `CATEGORIE` (`IDCATEGORIE`),
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`IDCLUB`) REFERENCES `CLUB` (`IDCLUB`),
  ADD CONSTRAINT `joueur_ibfk_3` FOREIGN KEY (`IDLIGUE`) REFERENCES `LIGUE` (`IDLIGUE`),
  ADD CONSTRAINT `joueur_ibfk_4` FOREIGN KEY (`IDINSCRIPTION`) REFERENCES `INSCRIPTION` (`IDINSCRIPTION`);
