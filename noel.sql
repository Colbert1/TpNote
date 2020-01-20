-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Janvier 2020 à 16:30
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `noel`
--

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `Id_User` int(100) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Classe` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `info`
--

INSERT INTO `info` (`Id_User`, `Nom`, `Prenom`, `Classe`) VALUES
(1, 'Colbert', 'Gregoire', 'Sn1'),
(2, 'Danel', 'Nathan', 'Sn1'),
(3, 'Mahieux', 'Francois', 'Sn2');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `id_cours` int(2) NOT NULL,
  `id_prof` int(2) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(10) NOT NULL,
  `liste_eleves` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `presence`
--

INSERT INTO `presence` (`id_cours`, `id_prof`, `date`, `heure`, `liste_eleves`) VALUES
(1, 1, '2020-01-09', '15:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(63) NOT NULL,
  `login` varchar(8) NOT NULL,
  `pwd` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `pseudo`, `login`, `pwd`) VALUES
(2, 'Danel', 'Danel', '1234'),
(3, 'Colbert', 'Colbert', '4567'),
(4, 'Eleve4', 'Eleve4', '4444'),
(1, 'Admin', 'Admin', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test` int(2) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`test`, `id`) VALUES
(1, ''),
(5, ''),
(2, 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
