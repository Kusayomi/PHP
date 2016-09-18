-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Décembre 2015 à 15:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_users`
--

CREATE TABLE IF NOT EXISTS `blog_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire',
  `user_login` varchar(60) NOT NULL COMMENT 'Login',
  `user_pass` varchar(64) NOT NULL COMMENT 'Password',
  `user_email` varchar(100) NOT NULL COMMENT 'Email',
  `display_name` varchar(250) NOT NULL COMMENT 'Nom affiché',
  `user_photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `blog_users`
--

INSERT INTO `blog_users` (`ID`, `user_login`, `user_pass`, `user_email`, `display_name`, `user_photo`) VALUES
(1, 'admin', 'admin', 'admin@blog.com', 'Administrateur 2', NULL),
(2, 'dupont', '123456', 'dupont@lemail.com', 'Jean Dupont', NULL),
(6, 'Jean', 'Pascal', 'mail@mail.com', 'Pascal', NULL),
(8, 'John', '123', 'John@snow.com', 'Snow', NULL),
(9, 'Garen', 'demacia', 'garen@lol.com', 'tourbilol', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
