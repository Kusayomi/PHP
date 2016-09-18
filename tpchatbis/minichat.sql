-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 21 Décembre 2015 à 10:28
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
-- Structure de la table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`, `date_creation`, `pays`) VALUES
(1, 'John', 'Je test le fonctionnement du mini chat', '0000-00-00 00:00:00', NULL),
(2, 'Doe', 'Je crois que sa fonctionnne', '0000-00-00 00:00:00', NULL),
(3, 'Alice', 'Moi aussi', '0000-00-00 00:00:00', NULL),
(4, 'Marie', 'C''est génial!', '0000-00-00 00:00:00', NULL),
(5, 'Oscars', 'On fait quoi demain?', '0000-00-00 00:00:00', NULL),
(6, 'Alexandre', 'Je sais pas, je vous laisse choisir', '0000-00-00 00:00:00', NULL),
(7, 'Doe', 'Ok', '0000-00-00 00:00:00', NULL),
(8, 'Kusayomi', 'Donc?', '0000-00-00 00:00:00', NULL),
(9, 'John', 'A vous de voir', '0000-00-00 00:00:00', NULL),
(10, 'Oscars', 'Go au parc Astérix', '0000-00-00 00:00:00', NULL),
(74, 'CW Freeze', 'why', '2015-12-21 09:44:34', NULL),
(75, 'CW Freeze', 'Sa marchais pas tout à l''heure', '2015-12-21 09:44:47', NULL),
(77, 'CW Freeze', 'allo la terre', '2015-12-21 09:44:58', NULL),
(78, 'CW Freeze', '?', '2015-12-21 09:45:00', NULL),
(80, 'Katarioo', 'On est ou là', '2015-12-21 09:56:42', NULL),
(81, 'Sednos', 'Sur mars', '2015-12-21 09:57:38', NULL),
(82, 'CW Freeze', 'Sa marche', '2015-12-21 10:19:26', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
