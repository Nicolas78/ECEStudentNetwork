-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 01 mai 2018 à 14:35
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
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(4) NOT NULL,
  `nom` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `prenom` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `motdepasse` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `lastConnexion` date DEFAULT NULL,
  `promotion` int(4) DEFAULT NULL,
  `type` enum('Administrateur','Auteur') CHARACTER SET latin1 NOT NULL DEFAULT 'Auteur',
  `interet` enum('Sport','Art','Jeux-vidéos','Sciences','Matlab','C','C++','Java','Html/Css','Python') CHARACTER SET latin1 DEFAULT NULL,
  `photo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `CV` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `imagefond` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `humeur` enum('CONTENT','BOF','PAS CONTENT','') CHARACTER SET latin1 DEFAULT 'CONTENT',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `motdepasse`, `lastConnexion`, `promotion`, `type`, `interet`, `photo`, `CV`, `imagefond`, `humeur`) VALUES
(1, 'Baralle', 'Nicolas', 'nicolas.baralle@edu.ece.fr', 'Nicolas', '2018-05-01', 2020, 'Auteur', 'Java', NULL, NULL, NULL, 'CONTENT'),
(2, 'Poletto', 'Mathieu', 'mathieu.poletto@edu.ece.fr', 'Mathieu', '2018-05-01', 2020, 'Administrateur', 'Sport', NULL, NULL, NULL, 'CONTENT'),
(3, 'Remurier', 'Leo', 'leo.remurier@edu.ece.fr', 'Leo', '2018-05-01', 2020, 'Auteur', 'Sport', NULL, NULL, NULL, 'CONTENT'),
(4, 'Saumon', 'Jean', 'jean.saumon@gmail.com', 'Jean', '2018-05-01', 2020, 'Auteur', 'Java', NULL, NULL, NULL, 'PAS CONTENT'),
(5, 'Carpe', 'Pierre', 'pierre.carpe@gmail.com', 'Pierre', '2018-05-01', 2020, 'Auteur', 'Sciences', NULL, NULL, NULL, 'BOF'),
(6, 'Merou', 'Didier', 'didier.meru@gmail.com', 'Didier', '2018-05-01', 2020, 'Auteur', 'Art', NULL, NULL, NULL, 'CONTENT'),
(7, 'Bar', 'Christophe', 'christophe.bar@gmail.com', 'Christophe', '2018-05-01', 2020, 'Auteur', 'C++', NULL, NULL, NULL, 'CONTENT'),
(8, 'Truite', 'Claude', 'claude.truite@gmail.com', 'Claude', '2018-05-01', 2020, 'Auteur', 'Python', NULL, NULL, NULL, 'CONTENT'),
(9, 'Merlu', 'Clement', 'clement.merlu@gmail.com', 'Clement', '2018-05-01', 2020, 'Auteur', 'C', NULL, NULL, NULL, 'CONTENT'),
(10, 'Requin', 'Charles', 'charles.requin@gmail.com', 'Charles', '2018-05-01', 2020, 'Auteur', 'Matlab', NULL, NULL, NULL, 'CONTENT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
