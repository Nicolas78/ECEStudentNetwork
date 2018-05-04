
DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `id_aime` int(4) NOT NULL,
  `date_aime` datetime NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_publication` int(4) NOT NULL,
  PRIMARY KEY (`id_aime`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id_aime`, `date_aime`, `id_utilisateur`, `id_publication`) VALUES
(1, '2018-05-08 07:23:23', 6, 1),
(2, '2018-05-02 15:17:24', 3, 1);

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

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `contenu`, `id_publication`, `id_utilisateur`) VALUES
(1, 'ceci est un commentaire', 1, 9),
(2, 'Ceci est aussi un commentaire', 1, 3);

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

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `type`, `id_utilisateur1`, `id_utilisateur2`) VALUES
(1, 'ami', 6, 3),
(2, 'contact professionel', 1, 5),
(3, 'ami', 7, 2),
(4, 'contact professionel', 1, 4),
(5, 'ami', 7, 9),
(6, 'contact professionel', 4, 8),
(7, 'contact professionel', 7, 9),
(8, 'contact professionel', 1, 4),
(9, 'ami', 5, 10),
(10, 'ami', 5, 6),
(11, 'ami', 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id_conversation` int(4) NOT NULL,
  `nom_conversation` varchar(30) NOT NULL,
  `id_utilisateur1` int(4) NOT NULL,
  `id_utilisateur2` int(4) NOT NULL,
  PRIMARY KEY (`id_conversation`),
  KEY `id_utilisateur1` (`id_utilisateur1`),
  KEY `id_utilisateur2` (`id_utilisateur2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `nom_conversation`, `id_utilisateur1`, `id_utilisateur2`) VALUES
(1, 'Offre emploi', 5, 9),
(2, 'Demande de CDI', 8, 3),
(3, 'Projet Econnect', 6, 4),
(4, 'Demande de stage', 8, 2),
(5, 'Rapport Projet', 1, 2),
(6, 'Mutation', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `id_emploi` int(4) NOT NULL,
  `type_emploi` enum('CDD','CDI','STAGE') NOT NULL,
  `actions` varchar(20) NOT NULL,
  `id_auteur` int(4) NOT NULL,
  `id_entreprise` int(4) NOT NULL,
  PRIMARY KEY (`id_emploi`),
  KEY `id_auteur` (`id_auteur`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`id_emploi`, `type_emploi`, `actions`, `id_auteur`, `id_entreprise`) VALUES
(1, 'CDI', 'Gestions des projets', 1, 1),
(2, 'CDI', 'assistants', 4, 1),
(3, 'CDD', 'Chef de projet', 7, 4),
(4, 'STAGE', 'stage communication', 10, 3),
(5, 'CDD', 'Respo Ventes', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(4) NOT NULL,
  `nom_entreprise` varchar(20) NOT NULL,
  `secteur_activite` varchar(20) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `mail_entreprise` varchar(20) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `secteur_activite`, `logo`, `mail_entreprise`) VALUES
(1, 'ENCOM', 'Numérique', 'bdd_et_sauvegarde/photos_profils_entreprises/1.jpg', 'encom@gmail.com'),
(2, 'Logee', 'Design', 'bdd_et_sauvegarde/photos_profils_entreprises/2.jpg', 'libee@yahoo.com'),
(3, 'Robotics', 'Robotique', 'bdd_et_sauvegarde/photos_profils_entreprises/3.jpg', 'robotics@outlook.com'),
(4, 'BLN', 'Numérique', 'bdd_et_sauvegarde/photos_profils_entreprises/4.jpg', 'bln@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(4) NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `fichier` varchar(200) NOT NULL,
  `date_media` datetime NOT NULL,
  `nbreLike` int(4) NOT NULL,
  `nbreCommentaire` int(4) NOT NULL,
  `nbrePartage` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id_media`, `lieu`, `fichier`, `date_media`, `nbreLike`, `nbreCommentaire`, `nbrePartage`, `id_utilisateur`) VALUES
(1, 'Paris', 'bdd_et_sauvegarde/photos_events/remise_diplomes.jpg', '2018-05-02 07:26:22', 0, 0, 0, 10);

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

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `date_message`, `contenu`, `id_conversation`) VALUES
(1, '2018-04-04 06:30:23', 'Bonjour, comment allez-vous?', 2),
(2, '2018-05-23 10:29:28', 'Merci de votre reponse.', 5),
(3, '2018-04-29 10:28:35', 'J\'ai un job pour vous!', 4),
(4, '2018-05-02 18:32:31', 'Merci pour votre offre', 1),
(5, '2018-05-23 10:30:00', 'Bien recu! ', 5),
(6, '2018-05-01 00:00:00', 'Reunion demain a 8h', 6);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(4) NOT NULL,
  `nom` enum('DEMANDE D''AMI','DEMANDE DE CONNAISSANCE PRO','NOUVELLE PUBLICATION','NOUVEAU MEDIA') NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `date_notif` datetime NOT NULL,
  `id_contact` int(4) DEFAULT NULL,
  `id_publication` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_contact` (`id_contact`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notification`, `nom`, `contenu`, `date_notif`, `id_contact`, `id_publication`) VALUES
(1, 'DEMANDE D\'AMI', 'Nouvelle demande d\'ami', '2018-05-02 14:18:00', 9, NULL),
(2, 'NOUVELLE PUBLICATION', 'nouvelle publication de Mr Saumon', '2018-04-19 00:28:00', 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `partage`
--

DROP TABLE IF EXISTS `partage`;
CREATE TABLE IF NOT EXISTS `partage` (
  `id_partage` int(4) NOT NULL,
  `date_partage` datetime NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_publication` int(4) NOT NULL,
  PRIMARY KEY (`id_partage`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partage`
--

INSERT INTO `partage` (`id_partage`, `date_partage`, `id_utilisateur`, `id_publication`) VALUES
(1, '2018-05-02 06:25:22', 9, 2),
(2, '2018-04-11 00:00:00', 6, 1),
(3, '2018-05-01 00:23:38', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(4) NOT NULL,
  `date_publication` datetime NOT NULL,
  `contenu` varchar(300) NOT NULL,
  `titre_publication` varchar(20) NOT NULL,
  `nbreLike` int(4) NOT NULL,
  `nbreCommentaire` int(4) NOT NULL,
  `nbrePartage` int(4) NOT NULL,
  `id_utilisateur` int(4) NOT NULL,
  `id_media` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_publication`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_media` (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `date_publication`, `contenu`, `titre_publication`, `nbreLike`, `nbreCommentaire`, `nbrePartage`, `id_utilisateur`, `id_media`) VALUES
(1, '2018-05-02 07:27:17', 'blabla', 'Remise de diplome', 0, 0, 0, 10, 1),
(2, '2018-04-11 11:23:00', 'Nouveau travail', 'Publication ', 0, 0, 0, 6, NULL),
(3, '2018-05-04 00:56:28', 'ckdcnoknc', 'ok', 0, 0, 0, 4, 1);

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
  `photo` varchar(100) DEFAULT NULL,
  `CV` varchar(100) DEFAULT NULL,
  `imagefond` varchar(100) DEFAULT NULL,
  `humeur` enum('CONTENT','BOF','PAS CONTENT','') DEFAULT 'CONTENT',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `motdepasse`, `lastConnexion`, `promotion`, `type`, `interet`, `photo`, `CV`, `imagefond`, `humeur`) VALUES
(1, 'Baralle', 'Nicolas', 'nicolas.baralle@edu.ece.fr', 'Nicolas', '2018-05-01', 2020, 'Auteur', 'Java', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil1.jpg', 'bdd_et_sauvegarde/fichier_cv/cv1.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond1.jpg', 'CONTENT'),
(2, 'Poletto', 'Mathieu', 'mathieu.poletto@edu.ece.fr', 'Mathieu', '2018-05-01', 2020, 'Administrateur', 'Sport', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil4.jpg', 'bdd_et_sauvegarde/fichier_cv/cv2.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond7.jpg', 'CONTENT'),
(3, 'Remurier', 'Leo', 'leo.remurier@edu.ece.fr', 'Leo', '2018-05-01', 2020, 'Auteur', 'Sport', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil5.jpg', 'bdd_et_sauvegarde/fichier_cv/cv3.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond2.jpg', 'CONTENT'),
(4, 'Saumon', 'Jean', 'jean.saumon@gmail.com', 'Jean', '2018-05-01', 2022, 'Auteur', 'Java', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil7.jpg', 'bdd_et_sauvegarde/fichier_cv/cv4.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond6.jpg', 'PAS CONTENT'),
(5, 'Carpe', 'Pierre', 'pierre.carpe@gmail.com', 'Pierre', '2018-05-01', 2020, 'Auteur', 'Sciences', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil6.jpg', 'bdd_et_sauvegarde/fichier_cv/cv5.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond8.jpg', 'BOF'),
(6, 'Merou', 'Didier', 'didier.meru@gmail.com', 'Didier', '2018-05-01', 2020, 'Auteur', 'Art', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil2.jpg', 'bdd_et_sauvegarde/fichier_cv/cv6.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond9.jpg', 'CONTENT'),
(7, 'Bar', 'Christophe', 'christophe.bar@gmail.com', 'Christophe', '2018-05-01', 2020, 'Auteur', 'C++', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil8.jpg', 'bdd_et_sauvegarde/fichier_cv/cv7.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond4.jpg', 'CONTENT'),
(8, 'Truite', 'Claude', 'claude.truite@gmail.com', 'Claude', '2018-05-01', 2020, 'Auteur', 'Python', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil3.jpg', 'bdd_et_sauvegarde/fichier_cv/cv8.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond10.jpg', 'CONTENT'),
(9, 'Merlu', 'Clement', 'clement.merlu@gmail.com', 'Clement', '2018-05-01', 2018, 'Auteur', 'C', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil9.jpg', 'bdd_et_sauvegarde/fichier_cv/cv9.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond5.jpg', 'CONTENT'),
(10, 'Requin', 'Charles', 'charles.requin@gmail.com', 'Charles', '2018-05-01', 2021, 'Auteur', 'Matlab', 'bdd_et_sauvegarde/photo_profil_utilisateurs/profil10.jpg', 'bdd_et_sauvegarde/fichier_cv/cv10.docx', 'bdd_et_sauvegarde/photo_fond_utilisateurs/fond3.jpg', 'CONTENT');

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
