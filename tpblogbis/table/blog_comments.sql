-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Décembre 2015 à 11:34
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
-- Structure de la table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `comment_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire',
  `comment_post_ID` int(11) NOT NULL COMMENT 'Clé vers le post',
  `comment_author` int(11) NOT NULL COMMENT 'Clé vers l''auteur',
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date du commentaire',
  `comment_content` text NOT NULL COMMENT 'Texte du commentaire',
  PRIMARY KEY (`comment_ID`),
  KEY `fk_blog_comments_blog_posts1` (`comment_post_ID`),
  KEY `fk_blog_comments_blog_users1` (`comment_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_date`, `comment_content`) VALUES
(1, 1, 2, '2012-04-11 12:27:00', 'Cette campagne est ennuyeuse à mourir !'),
(2, 1, 2, '2012-04-10 11:27:34', '30% d''abstension attendue ...'),
(3, 2, 2, '2012-04-10 12:29:23', 'Les commentaires sur les blogs ne sont que rarement intéressants');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
