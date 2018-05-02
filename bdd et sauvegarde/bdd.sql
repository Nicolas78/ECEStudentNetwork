--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `id_aime` int(4) NOT NULL,
  `date_aime` date NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_publication` int(4) NOT NULL,
  PRIMARY KEY (`id_aime`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(4) NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `id_publication` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(4) NOT NULL,
  `type` enum('ami','contact professionel') DEFAULT NULL,
  `id_utilisateur1` int(4) NOT NULL,
  `id_utilisateur2` int(4) NOT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `id_utilisateur1` (`id_utilisateur1`),
  KEY `id_utilisateur2` (`id_utilisateur2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id_conversation` int(4) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `id_utilisateur1` int(4) NOT NULL,
  `id_utilisateur2` int(4) NOT NULL,
  PRIMARY KEY (`id_conversation`),
  KEY `id_utilisateur1` (`id_utilisateur1`),
  KEY `id_utilisateur2` (`id_utilisateur2`)
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
  `id_entreprise` int(4) NOT NULL,
  PRIMARY KEY (`id_emploi`),
  KEY `id_auteur` (`id_auteur`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(4) NOT NULL,
  `nom_entreprise` varchar(20) NOT NULL,
  `secteur_activite` varchar(20) NOT NULL,
  `logo` int(4) NOT NULL,
  `mail_entreprise` varchar(20) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
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
  `nbreCommentaire` int(4) NOT NULL,
  `nbrePartage` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(4) NOT NULL,
  `date_message` datetime NOT NULL,
  `contenu` text NOT NULL,
  `id_conversation` int(4) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_conversation` (`id_conversation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(4) NOT NULL,
  `nom` varchar(12) NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `date_notif` date NOT NULL,
  `id_contact` int(4) NOT NULL,
  `id_publication` int(4) NOT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_contact` (`id_contact`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partage`
--

DROP TABLE IF EXISTS `partage`;
CREATE TABLE IF NOT EXISTS `partage` (
  `id_partage` int(4) NOT NULL,
  `date_partage` date NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_publication` int(4) NOT NULL,
  PRIMARY KEY (`id_partage`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(4) NOT NULL,
  `date_publication` date NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `titre_publication` varchar(20) NOT NULL,
  `nbreLike` int(4) NOT NULL,
  `nbreCommentaire` int(4) NOT NULL,
  `nbrePartage` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_media` int(4) NOT NULL,
  PRIMARY KEY (`id_publication`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_media` (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(4) NOT NULL,
  `nom` varchar(12) DEFAULT NULL,
  `prenom` varchar(12) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(12) DEFAULT NULL,
  `lastConnexion` date DEFAULT NULL,
  `promotion` int(4) DEFAULT NULL,
  `type` enum('Administrateur','Auteur') NOT NULL DEFAULT 'Auteur',
  `interet` enum('Sport','Art','Jeux-vidéos','Sciences','Matlab','C','C++','Java','Html/Css','Python') DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `CV` varchar(20) DEFAULT NULL,
  `imagefond` varchar(20) DEFAULT NULL,
  `humeur` enum('CONTENT','BOF','PAS CONTENT','') DEFAULT 'CONTENT',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `motdepasse`, `lastConnexion`, `promotion`, `type`, `interet`, `photo`, `CV`, `imagefond`, `humeur`) VALUES
(1, 'Nicolas', 'Baralle', 'nicolas.baralle@edu.ece.fr', 'nicolas', '2018-05-01', 2020, 'Auteur', 'Java', NULL, NULL, NULL, 'CONTENT'),
(2, 'Poletto', 'Mathieu', 'mathieu.poletto@edu.ece.fr', 'Mathieu', '2018-05-01', 2020, 'Administrateur', 'Sport', NULL, NULL, NULL, 'CONTENT'),
(3, 'Remurier', 'Leo', 'leo.remurier@edu.ece.fr', 'Leo', '2018-05-01', 2020, 'Auteur', 'Sport', NULL, NULL, NULL, 'CONTENT'),
(4, 'Saumon', 'Jean', 'jean.saumon@gmail.com', 'Jean', '2018-05-01', 2020, 'Auteur', 'Java', NULL, NULL, NULL, 'PAS CONTENT'),
(5, 'Carpe', 'Pierre', 'pierre.carpe@gmail.com', 'Pierre', '2018-05-01', 2020, 'Auteur', 'Sciences', NULL, NULL, NULL, 'BOF'),
(6, 'Merou', 'Didier', 'didier.meru@gmail.com', 'Didier', '2018-05-01', 2020, 'Auteur', 'Art', NULL, NULL, NULL, 'CONTENT'),
(7, 'Bar', 'Christophe', 'christophe.bar@gmail.com', 'Christophe', '2018-05-01', 2020, 'Auteur', 'C++', NULL, NULL, NULL, 'CONTENT'),
(8, 'Truite', 'Claude', 'claude.truite@gmail.com', 'Claude', '2018-05-01', 2020, 'Auteur', 'Python', NULL, NULL, NULL, 'CONTENT'),
(9, 'Merlu', 'Clement', 'clement.merlu@gmail.com', 'Clement', '2018-05-01', 2020, 'Auteur', 'C', NULL, NULL, NULL, 'CONTENT'),
(10, 'Requin', 'Charles', 'charles.requin@gmail.com', 'Charles', '2018-05-01', 2020, 'Auteur', 'Matlab', NULL, NULL, NULL, 'CONTENT');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aime`
--
ALTER TABLE `aime`
  ADD CONSTRAINT `aime_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aime_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_utilisateur1`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`id_utilisateur2`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`id_utilisateur1`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`id_utilisateur2`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conversation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id_contact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partage`
--
ALTER TABLE `partage`
  ADD CONSTRAINT `partage_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partage_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
