-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mars 2016 à 14:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `forcePerso` int(11) NOT NULL,
  `degats` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `nombreCoup` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `type` enum('magicien','guerrier') DEFAULT NULL,
  `timeEndormi` int(11) DEFAULT NULL,
  `atout` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `forcePerso`, `degats`, `niveau`, `experience`, `nombreCoup`, `dateCreation`, `type`, `timeEndormi`, `atout`) VALUES
(9, 'Wario', 0, 95, 3, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(13, 'Yoshi', 0, 95, 13, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(14, 'Toad', 10, 50, 1, 10, 4, '0000-00-00 00:00:00', 'magicien', 0, 3),
(17, 'Takamura', 0, 35, 60, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(21, 'Rick', 0, 70, 10, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(46, 'John', 10, 70, 10, 50, 29, '0000-00-00 00:00:00', NULL, NULL, NULL),
(47, 'Kami', 0, 35, 0, 0, 0, '0000-00-00 00:00:00', 'guerrier', 1456973643, 4),
(48, 'Waluigi', 10, 15, 1, 20, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(49, 'Superman', 20, 5, 40, 30, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(50, 'Batman', 15, 5, 1, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(52, 'Bowser', 5, 55, 1, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(53, 'Joker', 2, 20, 1, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(54, 'Boo', 25, 22, 31, 0, 3, '2002-03-16 00:00:00', NULL, NULL, NULL),
(55, 'Sangoku', 50, 30, 60, 60, 1, '2002-03-16 00:00:00', NULL, NULL, NULL),
(56, 'Vegeta', 40, 40, 50, 90, 0, '2002-03-16 00:00:00', NULL, NULL, NULL),
(57, 'Krilin', 20, 50, 1, 0, 1, '2016-03-02 12:09:24', NULL, NULL, NULL),
(58, 'Picolo', 2, 1, 1, 0, 0, '2016-03-02 12:10:51', NULL, NULL, NULL),
(59, 'Ezio', 15, 20, 10, 0, 0, '2016-03-02 12:12:47', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
