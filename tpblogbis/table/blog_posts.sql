-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Décembre 2015 à 11:22
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
-- Structure de la table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire',
  `post_author` int(11) NOT NULL COMMENT 'Clé vers l''auteur',
  `post_category` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date du post',
  `post_content` longtext NOT NULL COMMENT 'Contenu du post',
  `post_title` text NOT NULL COMMENT 'Titre du post',
  PRIMARY KEY (`post_ID`),
  KEY `fk_blog_posts_blog_users` (`post_author`),
  KEY `fk_blog_posts_blog_categories1` (`post_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `blog_posts`
--

INSERT INTO `blog_posts` (`post_ID`, `post_author`, `post_category`, `post_date`, `post_content`, `post_title`) VALUES
(58, 8, 1, '2015-11-05 21:16:56', 'Super sa marche ! :)', 'L''article de John'),
(41, 1, 2, '2015-10-21 12:06:03', 'Bonjour à tous, voici le dernier article de la semaine !!!', 'Nouvelle article !'),
(50, 1, 1, '2015-11-03 11:33:43', 'François hollande!!! Le changement c''est maintenant les vieux :) :D :(!!!!', 'L''article de Jean Dupont'),
(59, 2, 1, '2015-11-05 21:30:07', 'Lama lama lama ', 'COROBIZAR'),
(60, 1, 1, '2015-11-17 09:39:06', 'Cm apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'Hello'),
(61, 1, 1, '2015-11-17 09:39:17', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'C''est les vacances'),
(62, 1, 1, '2015-11-17 09:39:24', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'test13'),
(63, 1, 1, '2015-11-17 09:39:28', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'blog'),
(64, 1, 1, '2015-11-17 09:39:32', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'test2'),
(65, 1, 1, '2015-11-17 09:39:37', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'Test 15'),
(66, 1, 1, '2015-11-17 09:39:45', 'um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minim', 'L''article de Jean Dupont'),
(67, 1, 1, '2015-11-30 21:30:53', '\r\nContenu =um apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, ', 'C''est les vacances'),
(68, 1, 1, '2015-12-23 09:34:54', 'Vive noel', 'C''est les vacances'),
(3, 1, 3, '2012-03-31 09:00:00', 'François Bayrou hibernait-il ces dernières semaines? La question mérite d’être posée. Il aura fallu attendre le 25 mars pour que le candidat « central » tienne son premier, oui, son premier grand meeting, en présence de tous ses soutiens officiels. A vingt-huit jours du premier tour, il était temps. Car après son envolée du mois de décembre suite à l’annonce de sa candidature, François Bayrou est en perte de vitesse dans les sondages qui le placent désormais en cinquième position. Il fallait répliquer.\nAlors, après l’effet Bourget de François Hollande, l’effet Villepinte de Nicolas Sarkozy et surtout juste après l’effet Bastille de Jean-Luc Mélenchon, le président du MoDem, a profité du passage à l’heure d’été pour remettre les pendules à l’heure et créer l’effet Zénith. Plus de six mille personnes et un message d’espoir pour lancer, ou plutôt relancer la campagne au centre et délivrer les électeurs du débat imposé Droite-Gauche. Et pas question de se laisser impressionner par les enquêtes d’opinion défavorables. Une démonstration de force, oui, mais toujours tranquille.\n\nEn coulisses, juste avant d’entrer en scène pour prêcher la bonne parole dans un discours quasi mystique, François Bayrou affiche devant les caméras d’« Elysée 2012, la vraie campagne » sa sérénité.\n\n\n\n« Il n’y a pas d’espoir du côté de chez eux ». Ainsi parlait François Bayrou qui, dans un lyrisme « Proustien », s’en prenait une fois encore au bipartisme UMP-PS. Un bipartisme dont le président du MoDem ne saurait pourtant se passer, car sa position stratégique d’homme du centre ne pourrait exister aujourd’hui sans cette géographie politique.\n« Un pas en avant, deux pas en arrière »… François le Français abandonne Proust pour emprunter à la lutte sociale un vocabulaire contestataire et tenter de s’imposer comme le premier opposant aux deux « grands » de cette élection. Mais la situation de 2012 n’est pas celle d’il y a cinq ans. Le parti socialiste, cette fois-ci, est en ordre de bataille, uni derrière son candidat ; précieux atout dont avait été privée Ségolène Royal. Et Mélenchon, plus fort que jamais, semble, pour l’instant, voler la vedette à celui qui fût l’arbitre de 2007.\nAlors, François Bayrou est venu parler d’espoir. Peut-être est-il venu en chercher aussi, au milieu de ces milliers de sympathisants rassemblés. Nos caméras ont filmé ce jour-là un meeting en grand. L’effet Zénith est à nos yeux réussi. Mais de ces six mille personnes venues des quatre coins de la France par navettes mises à disposition par le parti, qu’en est-il vraiment de l’électorat du centre. Les électrons libres qui ne veulent ni d’Hollande, ni de Sarkozy, auront-ils cette fois-ci encore le réflexe consensuel et « géographique » du vote centriste ? Mieux encore pour le candidat du Modem, se laisseront-ils envoûter par l’espoir porté, ou du moins invoqué, par le Béarnais ? Une chose est sûre pour l’homme du « milieu », il faudra bien regarder du côté de chez eux….', 'L’espoir fait vivre… François Bayrou');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
