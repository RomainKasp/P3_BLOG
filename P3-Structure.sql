-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Mai 2018 à 00:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `commentaire`;
DROP TABLE IF EXISTS `billet`;
DROP TABLE IF EXISTS `utilisateur`;
-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
  `BIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_ID` int(11) NOT NULL DEFAULT '1',
  `BIL_TITRE` char(60) NOT NULL,
  `BIL_DAT_CRE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BIL_DAT_MOD` datetime DEFAULT NULL,
  `BIL_TXT` longtext NOT NULL,
  `BIL_DAT_VISU` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `BIL_EST_PAGE` tinyint(1) NOT NULL DEFAULT '0',
  `BIL_CHAP` smallint(6) NOT NULL DEFAULT '0',
  `BIL_IMG` char(60) DEFAULT NULL,
  PRIMARY KEY (`BIL_ID`),
  KEY `FK_REDIGER` (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_ID` int(11) DEFAULT NULL,
  `BIL_ID` int(11) NOT NULL,
  `COM_USR` char(60) NOT NULL,
  `COM_MAIL` char(100) DEFAULT NULL,
  `COM_TXT` char(255) NOT NULL,
  `COM_DAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COM_NBR_RPT` smallint(6) NOT NULL,
  `COM_ETAT` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`COM_ID`),
  KEY `FK_CONCERNER` (`BIL_ID`),
  KEY `FK_VALIDER` (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_NOM` char(60) NOT NULL,
  `UTI_PSW` varchar(255) NOT NULL,
  `UTI_DAT_CRE` datetime NOT NULL,
  `UTI_DAT_FIN` date NOT NULL,
  `UTI_MAIL` char(60) NOT NULL,
  PRIMARY KEY (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `FK_REDIGER` FOREIGN KEY (`UTI_ID`) REFERENCES `utilisateur` (`UTI_ID`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`BIL_ID`) REFERENCES `billet` (`BIL_ID`),
  ADD CONSTRAINT `FK_VALIDER` FOREIGN KEY (`UTI_ID`) REFERENCES `utilisateur` (`UTI_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
