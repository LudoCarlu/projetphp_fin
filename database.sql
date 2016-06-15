-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 15 Juin 2016 à 15:08
-- Version du serveur :  5.5.36-MariaDB-log
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `carlu`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `idA` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `emailAdmin` varchar(100) NOT NULL,
  `mdpAdmin` varchar(30) NOT NULL,
  `dateDeco` datetime DEFAULT NULL,
  PRIMARY KEY (`idA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`idA`, `pseudo`, `emailAdmin`, `mdpAdmin`, `dateDeco`) VALUES
(1, 'admin', 'ludoviccarlu@gmail.com', 'admin', '2016-06-15 09:04:48'),
(2, 'PeaNutZz', 'vkwan-teau@hotmail.fr', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `idAl` int(11) NOT NULL AUTO_INCREMENT,
  `idArt` int(11) NOT NULL,
  `nomAl` varchar(50) NOT NULL,
  `dateAl` date NOT NULL,
  `genre` varchar(40) NOT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`idAl`),
  KEY `idArt` (`idArt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`idAl`, `idArt`, `nomAl`, `dateAl`, `genre`, `note`) VALUES
(1, 2, 'X', '2014-06-20', 'pop', 3.66667),
(2, 1, 'Comme a la maison', '2008-09-29', 'pop', 3),
(3, 15, 'Listen', '2014-11-24', 'electro', 2.5),
(4, 16, 'MXTAPE', '2008-09-29', 'rap', 4.5),
(5, 9, 'Stories', '2015-10-02', 'electro', 3),
(6, 13, 'Bangarang', '2011-12-23', 'dubstep', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `idArt` int(11) NOT NULL AUTO_INCREMENT,
  `nomArt` varchar(50) DEFAULT NULL,
  `dateNaiss` date NOT NULL,
  `biographie` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idArt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`idArt`, `nomArt`, `dateNaiss`, `biographie`) VALUES
(1, 'Christophe Mae', '1975-10-16', 'Auteur-compositeur-interprete francais'),
(2, 'Ed Sheeran', '1991-02-17', 'Ed Sheeran, de son nom complet Edward Christopher Sheeran, né le 17 février 1991 à Halifax dans le Yorkshire de l''Ouest, est un auteur-compositeur-interprète britannique'),
(3, 'Calvin Harris', '1984-01-17', 'Calvin Harris, de son vrai nom Adam Richard Wiles, né le 17 janvier 1984 à Dumfries, est un disc jockey, chanteur et producteur de musique électronique britannique.'),
(4, 'Rihanna', '1988-02-20', 'Rihanna, de son vrai nom Robyn Rihanna Fenty, née le 20 février 1988 à Saint Michael, est une chanteuse, actrice et réalisatrice barbadienne.'),
(5, 'Elton John', '1947-03-25', 'Sir Elton Hercules John, né Reginald Kenneth Dwight le 25 mars 1947 à Pinner, dans le Middlesex, est un chanteur, pianiste et compositeur pop-rock anglais.'),
(8, 'Johnny Hallyday', '1943-06-15', 'Johnny Hallyday, de son vrai nom Jean-Philippe Smet, né le 15 juin 1943 à Paris, est un chanteur, compositeur et acteur français. Avec plus de cinquante cinq ans de carrière, il est l''un des plus célèbres chanteurs francophones et l''une des personnalités les plus présentes dans le paysage médiatique français, où plus de 2 100 couvertures de magazines lui ont été consacrées.'),
(9, 'Avicii', '1989-09-08', 'Avicii, de son vrai nom Tim Bergling, stylisé en ΛVICII, né le 8 septembre 1989 à Stockholm, est un producteur et disc-jockey suédois. Il a aussi produit des titres sous les pseudonymes de Tim Berg et Tom Hangs.'),
(10, 'Booba', '1976-12-09', 'Booba4, de son vrai nom Élie Yaffa, né le 9 décembre 1976 à Boulogne-Billancourt dans les Hauts-de-Seine, est un rappeur français. Il est membre du 92I, un collectif de rap français dont il a été le fondateur, regroupant des rappeurs issus des Hauts-de-Seine, Mala et Bram''s (ce dernier est mort le 21 mai 2011). Businessman très actif, il lance sa propre marque de vêtements streetwear et son propre parfum nommé Ünkut, ainsi qu''un site web et une application mobile nommés OKLM.'),
(11, 'Claude Francois', '1939-02-01', 'Claude François surnommé « Cloclo », né le 1er février 1939 à Ismaïlia en Égypte et mort accidentellement le 11 mars 1978 à l''âge de trente-neuf ans à Paris, est un chanteur populaire et producteur français des années 1960 et 1970.'),
(12, 'La Fouine', '1981-12-25', 'La Fouine, de son vrai nom Laouni Mouhid, né le 25 décembre 1981 à Trappes, dans les Yvelines, est un rappeur français d''origine marocaine'),
(13, 'Skrillex', '1988-01-15', 'Skrillex, de son vrai nom Sonny John Moore, né le 15 janvier 1988 à Los Angeles, est un DJ et compositeur américain de musique électronique.'),
(15, 'David Guetta', '1967-11-07', 'David Guetta, né le 7 novembre 1967 à Paris, est un disc jockey, remixeur, et producteur de musique français. Il débute adolescent avant de se professionnaliser juste avant la majorité3. Il se fait connaitre au début de sa carrière comme une figure des nuits parisiennes en faisant ses premières armes dans divers lieux parisiens vers la fin des années 1980.'),
(16, 'Mx.am', '1997-08-13', 'Jeune rappeur issu des milieux sensibles'),
(19, 'Kygo', '1991-09-11', 'Kygo, de son vrai nom Kyrre Gørvell-Dahll, né le 11 septembre 1991 à Singapour, est un DJ, musicien, auteur-compositeur et producteur norvégien. Il est connu pour ses compositions Firestone feat Conrad Sewell (2014) et Stole the Show feat Parson James (2015).');

-- --------------------------------------------------------


--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `idAl` int(11) DEFAULT NULL,
  `idU` int(11) DEFAULT NULL,
  `commentaire` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idC`),
  KEY `idAl` (`idAl`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idC`, `idAl`, `idU`, `commentaire`, `date`) VALUES
(2, 5, 4, 'Super album !', '2016-06-14 16:05:10');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'Carlu', 'Ludovic', 'ludoviccarlu@gmail.com'),
(2, 'Kwan-Teau', 'Vincent', 'vkwan-teau@hotmail.fr');

-- --------------------------------------------------------


--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bureau` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `email`, `bureau`) VALUES
(1, 'Monnerat', 'Denis', 'monnerat@u-pec.fr', 114),
(2, 'Loukianov', 'Oleg', 'oleg.loukianov@u-pec.fr', 114),
(3, 'Cegielski', 'Patrick', 'cegielski@u-pec.fr', 112),
(4, 'Renaud', 'Marie-Hélène', 'marie-helene.renaud@u-pec.fr', 113),
(5, 'Hernandez', 'Luc', 'luc.hernandez@u-pec.fr', 111),
(6, 'Crouan-Veron', 'Patricia', 'crouan@u-pec.fr', 113),
(7, 'Valarcher', 'Pierre', 'valarcher@u-pec.fr', 114),
(8, 'Gervais', 'Frédéric', 'frederic.gervais@u-pec.fr', 113),
(14, 'Monnerat', 'Denis', 'monnerat@u-pec.fr', 114),
(15, 'Loukianov', 'Oleg', 'oleg.loukianov@u-pec.fr', 114),
(16, 'Cegielski', 'Patrick', 'cegielski@u-pec.fr', 112),
(17, 'Renaud', 'Marie-HÃ©lÃ¨ne', 'marie-helene.renaud@u-pec.fr', 113),
(18, 'Hernandez', 'Luc', 'luc.hernandez@u-pec.fr', 111),
(19, 'Crouan-Veron', 'Patricia', 'crouan@u-pec.fr', 113),
(20, 'Valarcher', 'Pierre', 'valarcher@u-pec.fr', 114),
(21, 'Gervais', 'FrÃ©deric', 'frederic.gervais@u-pec.fr', 113);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`pseudo`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `idN` int(11) NOT NULL AUTO_INCREMENT,
  `idAl` int(11) DEFAULT NULL,
  `idU` int(11) DEFAULT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`idN`),
  KEY `idAl` (`idAl`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idN`, `idAl`, `idU`, `note`) VALUES
(1, 5, 1, 3),
(2, 3, 2, 4),
(3, 3, 1, 1);

--
-- Déclencheurs `note`
--
DROP TRIGGER IF EXISTS `after_insert_note`;
DELIMITER //
CREATE TRIGGER `after_insert_note` AFTER INSERT ON `note`
 FOR EACH ROW BEGIN
DECLARE moyenne FLOAT ;

SET moyenne = (SELECT AVG(note) from note WHERE note.idAl=NEW.idAl);

UPDATE album SET note = moyenne WHERE idAl = NEW.idAL;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_note`;
DELIMITER //
CREATE TRIGGER `after_update_note` AFTER UPDATE ON `note`
 FOR EACH ROW BEGIN
DECLARE moyenne FLOAT ;

SET moyenne = (SELECT AVG(note) from note WHERE note.idAl=NEW.idAl);

UPDATE album SET note = moyenne WHERE idAl = NEW.idAL;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idU` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mdpU` varchar(30) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `nomU` varchar(50) DEFAULT NULL,
  `prenomU` varchar(50) DEFAULT NULL,
  `dateDeco` datetime DEFAULT NULL,
  PRIMARY KEY (`idU`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `email`, `mdpU`, `pseudo`, `nomU`, `prenomU`, `dateDeco`) VALUES
(1, 'ludoviccarlu@gmail.com', 'admin', 'admin', 'Carlu', 'Ludovic', NULL),
(2, 'vkwan-teau@hotmail.fr', 'admin', 'PeaNutZz', 'Kwan-Teau', 'Vincent', NULL),
(4, 'ludoviccarlu@orange.fr', 'mdp', 'FlashMcQueen', 'Carlu', 'Ludovic', '2016-06-15 09:02:37');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`idArt`) REFERENCES `artiste` (`idArt`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idAl`) REFERENCES `album` (`idAl`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idU`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idAl`) REFERENCES `album` (`idAl`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
