-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 19 Avril 2019 à 07:25
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `EcoleDirecte`
--

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `Id_Eleve` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Eleve`
--

INSERT INTO `Eleve` (`Id_Eleve`, `Nom`, `Prenom`, `MotDePasse`) VALUES
(1, 'Colbert', 'Grégoire', '123456'),
(2, 'Danel', 'Nathan', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `Id_Note` int(11) NOT NULL,
  `Id_Prof` int(11) NOT NULL,
  `Id_Eleve` int(11) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Note`
--

INSERT INTO `Note` (`Id_Note`, `Id_Prof`, `Id_Eleve`, `Note`) VALUES
(3, 2, 1, 20),
(4, 1, 2, 15),
(5, 1, 2, 12),
(6, 1, 2, 12),
(7, 1, 2, 12),
(13, 1, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `Prof`
--

CREATE TABLE `Prof` (
  `Id_Prof` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `MotDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Prof`
--

INSERT INTO `Prof` (`Id_Prof`, `Nom`, `Prenom`, `MotDePasse`) VALUES
(1, 'Langlace', 'Julien', '123456'),
(2, 'Gremont', 'Alexandre', '123456'),
(3, 'FLEMAL', 'ROMAIN', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `Id_User` int(11) NOT NULL,
  `Acces` int(11) NOT NULL,
  `Id_Prof` int(11) NOT NULL,
  `Id_Eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`Id_Eleve`),
  ADD KEY `Id_Eleve` (`Id_Eleve`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`Id_Note`),
  ADD KEY `Id_Prof` (`Id_Prof`),
  ADD KEY `Id_Eleve` (`Id_Eleve`);

--
-- Index pour la table `Prof`
--
ALTER TABLE `Prof`
  ADD PRIMARY KEY (`Id_Prof`),
  ADD KEY `Id_Prof` (`Id_Prof`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `Id_Prof` (`Id_Prof`),
  ADD KEY `Id_Eleve` (`Id_Eleve`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Eleve`
--
ALTER TABLE `Eleve`
  MODIFY `Id_Eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Note`
--
ALTER TABLE `Note`
  MODIFY `Id_Note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `Prof`
--
ALTER TABLE `Prof`
  MODIFY `Id_Prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `Note_ibfk_1` FOREIGN KEY (`Id_Eleve`) REFERENCES `Eleve` (`Id_Eleve`),
  ADD CONSTRAINT `Note_ibfk_2` FOREIGN KEY (`Id_Prof`) REFERENCES `Prof` (`Id_Prof`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`Id_Eleve`) REFERENCES `Eleve` (`Id_Eleve`),
  ADD CONSTRAINT `User_ibfk_2` FOREIGN KEY (`Id_Prof`) REFERENCES `Prof` (`Id_Prof`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
