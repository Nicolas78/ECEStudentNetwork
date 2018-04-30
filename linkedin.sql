-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 avr. 2018 à 13:35
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `linkedin`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

DROP TABLE IF EXISTS `ami`;
CREATE TABLE IF NOT EXISTS `ami` (
  `id_auteurAmi` int(4) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  PRIMARY KEY (`id_auteurAmi`),
  UNIQUE KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(4) NOT NULL,
  `nom` varchar(12) DEFAULT NULL,
  `prenom` varchar(12) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL,
  `motdepasse` varchar(12) DEFAULT NULL,
  `lastConnexion` date DEFAULT NULL,
  `id_emploi` int(4) DEFAULT NULL,
  `id_event` int(4) DEFAULT NULL,
  `id_ami` int(4) DEFAULT NULL,
  `humeur` enum('CONTENT','BOF','PAS CONTENT','') DEFAULT 'CONTENT',
  `photo` varchar(20) DEFAULT NULL,
  `CV` varchar(20) DEFAULT NULL,
  `imagefond` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `id_emploi` int(4) NOT NULL,
  `entreprise` varchar(20) NOT NULL,
  `periode` int(20) NOT NULL,
  `actions` varchar(20) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  PRIMARY KEY (`id_emploi`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_event` int(4) NOT NULL,
  `date_event` date NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `nbreLike` int(4) NOT NULL,
  `nbreSmileHappy` int(4) NOT NULL,
  `nbreSmileBad` int(4) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(4) NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `date_media` date NOT NULL,
  `nbreLike` int(4) NOT NULL,
  `nbreSmileHappy` int(4) NOT NULL,
  `nbreSmileBad` int(4) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  PRIMARY KEY (`id_media`),
  UNIQUE KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(4) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  `id_ami` int(4) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_auteur` (`id_auteur`),
  UNIQUE KEY `id_ami` (`id_ami`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `ami_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_ami`) REFERENCES `ami` (`id_auteurAmi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
